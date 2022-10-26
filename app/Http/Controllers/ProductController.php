<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Transformers\ProductTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProductController extends Controller
{
    public function index(): string
    {
        $searchQuery = '';

        if (request()->has('query')) {
            $searchQuery = request('query');
        }

        $products = Product::searchBySku($searchQuery)->get();

        $fractal  = new Manager;
        $resource = new Collection($products, new ProductTransformer);

        return $fractal->createData($resource)->toJson();
    }

    public function show(int $product): string
    {
        $fractal = new Manager;
        $product = Product::where('id', $product)->firstOrFail();

        return $fractal->createData(new Item($product, new ProductTransformer))->toJson();
    }
}
