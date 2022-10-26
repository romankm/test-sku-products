<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;

/** @var Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => ['api',]], function ($api) {
    $api->get('products', [ProductController::class, 'index']);
    $api->get('products/{product:id}', [ProductController::class, 'show']);
});
