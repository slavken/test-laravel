<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use App\Jobs\SendComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'body' => 'required'
        ]);

        $article = Article::findOrFail($request->id);

        SendComment::dispatch([
            'id' => $article->id, 
            'subject' => $request->subject,
            'body' => $request->body
        ])->delay(now()->addSeconds(10))->onQueue('comments');

        return response()->json([], 201);
    }
}
