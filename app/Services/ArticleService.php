<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 07.01.2019
 * Time: 11:11
 */

namespace App\Services;


use App\Models\Article;

class ArticleService
{

    /**
     * Возвращает массив со всеми именами статей, с ид в роли индексов массива
     * @return array
     */
    public function getAllArticleTitleKeysIndex()
    {
        return Article::where('status', '=', '1')->get()->keyBy('id')->map(function ($model){
            return $model->title;
        })->toArray();
    }

    /**
     * Возвращает массив со всеми именами статей без указаного ид, с ид в роли индексов массива.
     * @param $id
     * @return array
     */
    public function getArticleTitlesKeysIndexWithoutId($id)
    {
        $categories = $this->getAllArticleTitleKeysIndex();
        unset($categories[$id]);
        return $categories;
    }
}