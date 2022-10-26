<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCount = 10;

        $productsData = [];

        for ($i = 1; $i <= $productCount; $i++) {
            $productsData[] = [
                'sku' => 'SKU-00' . $i,
                'name' => 'Продукт ' . $i,
            ];
        }

        DB::table('products')->insert($productsData);
    }
}
