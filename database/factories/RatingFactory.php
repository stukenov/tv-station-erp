<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\TvShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition()
    {
        return [
            'tv_show_id' => TvShow::factory(),
            'date' => $this->faker->date(),
            'viewers' => $this->faker->numberBetween(100000, 10000000),
            'rating_value' => $this->faker->randomFloat(1, 0, 10),
            'audience_share' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}