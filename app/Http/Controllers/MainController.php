<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MainController extends Controller
{
    const DEFAULT_PER_PAGE_ARTICLES = 12;

    public function index()
    {

        $articles = Article::paginate(self::DEFAULT_PER_PAGE_ARTICLES);

        return view('pages.index', [
            'articles' => $articles
        ]);
    }
}
