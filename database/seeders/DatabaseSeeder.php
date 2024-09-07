<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            PageSeeder::class,
            MenuSeeder::class,
            SeoSeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
