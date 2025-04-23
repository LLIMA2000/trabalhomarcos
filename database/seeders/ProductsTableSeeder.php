<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'SH Figuarts Goku',
                'description' => 'Action figure do Goku da linha SH Figuarts',
                'price' => 199.99,
                'image_path' => 'goku.png'
            ],
            [
                'name' => 'SH Figuarts Naruto',
                'description' => 'Action figure do Naruto da linha SH Figuarts',
                'price' => 199.99,
                'image_path' => 'narutoshf.jpg'
            ],
            [
                'name' => 'SH Figuarts Vegeta',
                'description' => 'Action figure do Vegeta da linha SH Figuarts',
                'price' => 199.99,
                'image_path' => 'vegeta_super_hero.jpg'
            ],
            [
                'name' => 'SH Figuarts Super Saiyan 2 Goku',
                'description' => 'Goku Super Saiyan 2 da linha SH Figuarts',
                'price' => 599.99,
                'image_path' => 'goku_ssj2.jpg'
            ],
            [
                'name' => 'Mafex Cyclops',
                'description' => 'Ciclope dos X-Men da linha Mafex',
                'price' => 399.99,
                'image_path' => 'ciclope.jpg'
            ],
            [
                'name' => 'Mafex Wolverine',
                'description' => 'Wolverine dos X-Men da linha Mafex',
                'price' => 399.99,
                'image_path' => 'wolverine.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}