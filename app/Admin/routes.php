<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');


    $router->group(['prefix' => '/articles'], function(Router $router){
        $router->get('/', 'ArticleController@index');
        $router->match(['post','get', 'put'],'/{id}', 'ArticleController@show');
        $router->get('/create', 'ArticleController@create');
        $router->match(['post','get', 'put'],'/{id}/edit', 'ArticleController@edit');
        $router->get('/{id}/delete', 'ArticleController@delete');
    });

    $router->group(['prefix' => 'categories'], function(Router $router){
        $router->get('/', 'CategoryController@index');
        $router->match(['post','get', 'put'],'/{id}', 'CategoryController@show');
        $router->match(['post','get', 'put'],'/{id}/edit', 'CategoryController@edit');
        $router->get('/{id}/delete', 'CategoryController@delete');
    });








});
