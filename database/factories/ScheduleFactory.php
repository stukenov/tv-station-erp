<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\TvShow;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        return [
            'tv_show_id' => TvShow::factory(),
            'episode_id' => Episode::factory(),
            'start_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'end_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'day_of_week' => $this->faker->dayOfWeek,
        ];
    }
}