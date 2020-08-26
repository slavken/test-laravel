<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    function get($id)
    {
        $article = Article::find($id)
            ->likes;

        return response()->json(['result' => $article]);
    }

    function set(Request $request)
    {
        $article = Article::find($request->id);

        $article->increment('likes');

        return response()->json(['result' => $article->likes]);
    }
}
