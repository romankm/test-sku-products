<?php

use App\Http\Controllers\ProductController;

/** @var Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('products', [ProductController::class, 'index']);
    $api->get('products/{product}', [ProductController::class, 'show']);
});
