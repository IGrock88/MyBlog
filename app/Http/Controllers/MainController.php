<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {

        $articles = Article::paginate(1);

        return view('pages.index', [
            'articles' => $articles
        ]);
    }
}
