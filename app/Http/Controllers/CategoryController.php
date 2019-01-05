<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 05.01.2019
 * Time: 10:12
 */

namespace App\Http\Controllers;


use App\Models\Category;

class CategoryController extends Controller
{

    public function show($slug)
    {

        $category = Category::bySlug($slug)->get()->pop();

        return view('pages.category', ['category' => $category]);
    }
}