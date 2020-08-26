<?php

namespace App\Http\Controllers;

use App\Article;
use App\Jobs\IncrementView;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::with('comments')->where('slug', $slug)
            ->firstOrFail();

        IncrementView::dispatch($article)
            ->delay(now()->addSeconds(5));

        return view('articles.show', ['article' => $article]);
    }
}
