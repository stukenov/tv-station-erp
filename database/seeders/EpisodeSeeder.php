<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\TvShow;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    public function run()
    {
        TvShow::all()->each(function ($tvShow) {
            Episode::factory()->count(rand(5, 20))->create(['tv_show_id' => $tvShow->id]);
        });
    }
}