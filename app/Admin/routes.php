<?php


use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');


    $router->resources([
        'article' => ArticleController::class,
        'category' => CategoryController::class,
        'global-option' => GlobalOptionsController::class,
        'main-menu' => MainMenuController::class,
        'comment' => CommentController::class
    ]);







});
