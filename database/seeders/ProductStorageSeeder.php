<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->select('id')->get();

        foreach ($products as $product) {
            $quantity = rand(1, 100);

            DB::table('storage')->insert([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
