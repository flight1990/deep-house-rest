<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(rand(1, 4), true)),
            'description' => $this->faker->realText(),
            'link' => $this->faker->url,
            'alt' => $this->faker->word(),
            'photo_id' => Media::query()->inRandomOrder()->value('id'),
        ];
    }
}
