<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Beras 5 Kg',
                'description' => 'Beras.',
                'price' => 74500,
                'stock' => 35,
            ],
            [
                'name' => 'Minyak Goreng 1 Liter',
                'description' => 'Minyak goreng.',
                'price' => 18500,
                'stock' => 80,
            ],
            [
                'name' => 'Gula Pasir 1 Kg',
                'description' => 'Gula pasir.',
                'price' => 17500,
                'stock' => 50,
            ],
            [
                'name' => 'Mi Instan.',
                'description' => 'Mi instan.',
                'price' => 3500,
                'stock' => 120,
            ],
            [
                'name' => 'Teh Celup 25 Kantong',
                'description' => 'Teh celup.',
                'price' => 9200,
                'stock' => 45,
            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate(
                ['name' => $product['name']],
                $product,
            );
        }
    }
}
