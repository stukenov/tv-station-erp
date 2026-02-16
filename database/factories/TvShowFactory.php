<?php

namespace Database\Factories;

use App\Models\TvShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class TvShowFactory extends Factory
{
    protected $model = TvShow::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'genre' => $this->faker->word,
            'duration' => $this->faker->numberBetween(20, 60),
            'air_time' => $this->faker->time('H:i'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'cancelled']),
        ];
    }
}