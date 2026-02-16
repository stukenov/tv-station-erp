<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\TvShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    protected $model = Episode::class;

    public function definition()
    {
        return [
            'tv_show_id' => TvShow::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'season_number' => $this->faker->numberBetween(1, 10),
            'episode_number' => $this->faker->numberBetween(1, 24),
            'air_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'duration' => $this->faker->numberBetween(20, 60),
        ];
    }
}