<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(rand(1,3), true)),
            'description' => $this->faker->realText(700),
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'category_id' => Category::query()->inRandomOrder()->value('id')
        ];
    }
}
