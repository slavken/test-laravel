<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        $recentArticles = Article::orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('main', ['recentArticles' => $recentArticles]);
    }
}
