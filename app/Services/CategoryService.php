<?php

namespace App\Services;


use App\Models\Category;

class CategoryService
{

    /**
     * Возвращает массив со всеми именами категорий, с ид в роли индексов массива
     * @return array
     */
    public function getAllCategoriesNameKeysIndex()
    {
        return Category::where('public', '=', '1')->get()->keyBy('id')->map(function ($model){
            return $model->name;
        })->toArray();
    }

    /**
     * Возвращает массив со всеми именами категорий без указаного ид, с ид в роли индексов массива.
     * @param $id
     * @return array
     */
    public function getCategoryNamesKeysIndexWithoutId($id)
    {
        $categories = $this->getAllCategoriesNameKeysIndex();
        unset($categories[$id]);
        return $categories;
    }
}