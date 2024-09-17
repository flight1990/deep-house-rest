<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => ucfirst($this->faker->words(rand(2, 4), true)).'?',
            'answer' => $this->faker->realText(400),
        ];
    }
}
