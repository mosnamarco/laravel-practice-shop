<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(
            [
                'user_id' => 1,
                'product_name' => "Classic Denim",
                'price' => 499.57,
                'img' => 'fab.png'
            ]
        );

    }
}
