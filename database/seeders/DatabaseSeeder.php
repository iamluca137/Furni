<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ImageProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(100)->create()->each(function ($product) {
            $product->images()->saveMany(ImageProduct::factory(4)->make());
        });
        // Coupon::factory(50)->create();
    }
}
