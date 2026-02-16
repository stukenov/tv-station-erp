<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Advertiser;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    public function run()
    {
        Advertiser::all()->each(function ($advertiser) {
            Advertisement::factory()->count(rand(1, 5))->create([
                'advertiser_id' => $advertiser->id
            ]);
        });
    }
}