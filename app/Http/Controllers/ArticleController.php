<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 06.01.2019
 * Time: 11:16
 */

namespace App\Http\Controllers;


use App\Models\Article;

class ArticleController extends Controller
{

    public function show($slug)
    {

        $article = Article::where('slug', '=', $slug)->get()->pop();

        return view('pages.article', [
            'article' => $article
        ]);
    }
}