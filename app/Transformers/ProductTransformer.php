<?php


namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product): array
    {
        return [
            'id'    => (int) $product->id,
            'sku'   => $product->sku,
            'name'  => $product->name,
        ];
    }
}
