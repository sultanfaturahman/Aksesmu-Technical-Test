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
                'name' => 'Beras Premium 5 Kg',
                'description' => 'Beras premium untuk kebutuhan harian warung dan rumah tangga.',
                'price' => 74500,
                'stock' => 35,
            ],
            [
                'name' => 'Minyak Goreng 1 Liter',
                'description' => 'Minyak goreng kemasan satu liter.',
                'price' => 18500,
                'stock' => 80,
            ],
            [
                'name' => 'Gula Pasir 1 Kg',
                'description' => 'Gula pasir putih kemasan satu kilogram.',
                'price' => 17500,
                'stock' => 50,
            ],
            [
                'name' => 'Mi Instan Goreng',
                'description' => 'Mi instan rasa goreng untuk stok warung.',
                'price' => 3500,
                'stock' => 120,
            ],
            [
                'name' => 'Teh Celup 25 Kantong',
                'description' => null,
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
