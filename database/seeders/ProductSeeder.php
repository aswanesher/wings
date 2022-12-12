<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'product_code' => 'SKUSKILNP',
                'product_name' => 'So klin Pewangi',
                'price' => 15000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_code' => 'GVBR',
                'product_name' => 'Giv Biru',
                'price' => 11000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '5 cm x 4 cm',
                'unit' => 'PCS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_code' => 'SOKLLQD',
                'product_name' => 'So Klin Liquid',
                'price' => 18000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '10 cm x 15 cm',
                'unit' => 'PCS',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
