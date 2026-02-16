<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\TvShow;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        TvShow::all()->each(function ($tvShow) {
            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($daysOfWeek as $day) {
                Schedule::factory()->create([
                    'tv_show_id' => $tvShow->id,
                    'day_of_week' => $day,
                ]);
            }
        });
    }
}