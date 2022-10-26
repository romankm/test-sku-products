<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeSearchBySku(Builder $builder, string $sku = ''): void
    {
        $builder->when($sku, function ($builder) use ($sku) {
            $builder->where('sku', 'LIKE',  "%{$sku}%");
        });
    }
}
