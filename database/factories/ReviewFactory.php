<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(rand(3,5), true),
            'message' => $this->faker->realText(750),
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'product_id' => Product::query()->inRandomOrder()->value('id')
        ];
    }
}
