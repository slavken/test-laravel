<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Jobs\SendComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'body' => 'required'
        ]);

        SendComment::dispatch([
            'id' => $id, 
            'subject' => $request->subject,
            'body' => $request->body
        ])->delay(now()->addSeconds(10))->onQueue('comments');

        return back();
    }
}
