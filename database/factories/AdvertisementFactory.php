<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Advertiser;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    protected $model = Advertisement::class;

    public function definition()
    {
        return [
            'advertiser_id' => Advertiser::factory(),
            'title' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(15, 60),
            'content' => $this->faker->paragraph,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}