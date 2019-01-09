<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 02.01.2019
 * Time: 20:19
 */

namespace App\Widgets;

use App\Models\Category;

class MainMenuWidget implements IWidget
{

    public function execute()
    {
        $categories = Category::isActive()->get();

        return view('Widgets::main-menu', [
            'categories' => $categories
        ]);
    }





}