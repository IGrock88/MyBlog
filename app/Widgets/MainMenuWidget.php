<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 02.01.2019
 * Time: 20:19
 */

namespace App\Widgets;


use App\Models\Category;
use App\Models\MainMenu;

class MainMenuWidget implements IWidget
{

    public function execute(){

        return view('Widgets::main-menu', [
            'categories' => $categories
        ]);
    }


}