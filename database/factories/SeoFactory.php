<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(rand(1,3), true)),
            'description' => $this->faker->realText(200),
            'keywords' => ucfirst($this->faker->words(rand(4,7), true)),
        ];
    }
}
