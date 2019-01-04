<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 03.01.2019
 * Time: 15:37
 */

namespace App\Widgets;


class ArticlesContainer implements IWidget
{
    private $articles;

    public function __construct($articles = null)
    {
        $this->articles = $articles;
    }

    /**
     * Основной метод любого виджета, который должен возвращать вывод шаблона:
     *  return view('Widgets::NameWidget', [
     *  'data' => $data
     *  ]);
     */
    public function execute()
    {
        return view('Widgets::articles.articles-container', [
            'articles' => $this->articles
        ]);
    }
}