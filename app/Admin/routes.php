<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('products', ProductController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('brandings', BrandingController::class);
    $router->resource('sizes', SizeController::class);
    $router->resource('banners', BannerController::class);
    $router->resource('filter-prices', FilterPriceController::class);
    $router->resource('orders', OrderController::class);
    $router->get('orders/{id}', [OrderController::class, 'getOrderDetail']);
});
