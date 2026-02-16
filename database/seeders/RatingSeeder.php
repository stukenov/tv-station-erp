<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\TvShow;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run()
    {
        $tvShows = TvShow::all();

        foreach ($tvShows as $tvShow) {
            $startDate = now()->subMonths(3);
            $endDate = now();

            while ($startDate <= $endDate) {
                Rating::create([
                    'tv_show_id' => $tvShow->id,
                    'date' => $startDate,
                    'viewers' => fake()->numberBetween(100000, 1000000),
                    'rating_value' => fake()->randomFloat(1, 1, 10),
                    'audience_share' => fake()->randomFloat(2, 1, 50),
                ]);

                $startDate->addWeek();
            }
        }
    }
}