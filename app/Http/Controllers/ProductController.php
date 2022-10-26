<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\ResourceAbstract;

class ProductController extends Controller
{
    public function index()
    {
        $fractal = new Manager;

        $searchQuery = '';

        if (request()->has('query')) {
            $searchQuery = request('query');
        }

        $products = Product::searchByScu($searchQuery)->get();

        $resource = new Collection($products, function (Product $product) {
            return [
                'id' => $product->id,
                'sku' => $product->sku,
                'name' => $product->name,
            ];
        });

        $response = $fractal->createData($resource)->toJson();

        return $response;
    }

    public function show(Request $request, Product $product)
    {
        dd($product);
        return $product;
    }
}
