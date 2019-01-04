<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 02.01.2019
 * Time: 20:07
 */

namespace App\Widgets;


interface IWidget
{

    /**
     * Основной метод любого виджета, который должен возвращать вывод шаблона:
     *  return view('Widgets::NameWidget', [
     *  'data' => $data
     *  ]);
     */
    public function execute();
}