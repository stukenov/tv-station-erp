<?php

namespace Database\Seeders;

use App\Models\PerformanceReview;
use Illuminate\Database\Seeder;

class PerformanceReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PerformanceReview::factory(10)->create();
    }
}