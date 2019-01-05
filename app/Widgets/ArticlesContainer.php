<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 03.01.2019
 * Time: 15:37
 */

namespace App\Widgets;


use App\Models\Article;

class ArticlesContainer implements IWidget
{
    const DEFAULT_PER_PAGE_ARTICLES = 12;
    private $articles;

    public function __construct($data = [])
    {
        if ($data == null){
            $this->articles = Article::paginate(self::DEFAULT_PER_PAGE_ARTICLES);
        }
        else {
            $category = $data['categoryId'];
            $this->articles = Article::byCategory($category)->paginate(self::DEFAULT_PER_PAGE_ARTICLES)

            ;
        }

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