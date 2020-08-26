<?php

namespace App\Http\Controllers\API;

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
        SendComment::dispatch([
            'id' => $request->id, 
            'subject' => $request->subject,
            'body' => $request->body
        ])->delay(now()->addSeconds(10))->onQueue('comments');

        return response()->json([], 201);
    }
}
