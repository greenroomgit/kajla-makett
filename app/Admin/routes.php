<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('kit-requests', KitRequestsController::class);
    $router->resource('photo-uploads', PhotoUploadsController::class);
    $router->resource('videos', VideosController::class);

});