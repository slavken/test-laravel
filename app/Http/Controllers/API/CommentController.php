<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use App\Jobs\SendComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false, 
                'message' => $validator->errors()
            ], 400);
        }

        if (!Article::find($request->id)) {
            return response()->json(['status' => false], 404);
        }

        SendComment::dispatch([
            'id' => $request->id, 
            'subject' => $request->subject,
            'body' => $request->body
        ])->delay(now()->addSeconds(10))->onQueue('comments');

        return response()->json(['status' => true], 201);
    }
}
