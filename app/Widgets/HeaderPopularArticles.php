<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 04.01.2019
 * Time: 15:13
 */

namespace App\Widgets;


use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HeaderPopularArticles implements IWidget
{

    const LIMIT_ARTICLES = 3;

    /**
     * Основной метод любого виджета, который должен возвращать вывод шаблона:
     *  return view('Widgets::NameWidget', [
     *  'data' => $data
     *  ]);
     */
    public function execute()
    {

        //$articles = DB::table('article')->orderBy('views', 'desc')->limit(self::LIMIT_ARTICLES)->get();


        $articles = Article::orderBy('views', 'desc')->limit(self::LIMIT_ARTICLES)->get();

        $mostPopular = $articles->shift();

        return view('Widgets::header-popular-articles', [
            'mostPopular' => $mostPopular,
            'articles' => $articles
        ]);
    }
}