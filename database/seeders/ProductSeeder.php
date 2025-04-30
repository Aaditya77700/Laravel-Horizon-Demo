<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            ['name' => 'Wireless Mouse', 'price' => 20.99, 'stock' => 100],
            ['name' => 'Mechanical Keyboard', 'price' => 49.99, 'stock' => 75],
            ['name' => 'USB-C Hub', 'price' => 29.99, 'stock' => 50],
            ['name' => 'Webcam 1080p', 'price' => 59.99, 'stock' => 30],
        ]);
    }
}