<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(10)
            ->create()->each(function ($product) {

                $productPhotos = Media::query()
                    ->inRandomOrder()
                    ->limit(4)
                    ->pluck('id')
                    ->toArray();

                $product->photos()->attach($productPhotos);
            });
    }
}
