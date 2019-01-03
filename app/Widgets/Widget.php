<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 02.01.2019
 * Time: 20:09
 */

namespace App\Widgets;


class Widget
{
    protected $widgets; //массив доступных виджетов config/widgets.php

    public function __construct(){
        $this->widgets = config('widgets');
    }

    public function show($obj, $data =[]){
        //Есть ли такой виджет
        if(isset($this->widgets[$obj])){
            //создаем его объект передавая параметры в конструктор
            $obj = \App::make($this->widgets[$obj], $data);
            //возвращаем результат выполнения
            return $obj->execute();
        }
    }
}