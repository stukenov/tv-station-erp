<?php

namespace Tests\Unit;

use App\Models\TvShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TvShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_tv_show()
    {
        $tvShowData = [
            'title' => 'Test Show',
            'description' => 'This is a test show',
            'genre' => 'Drama',
            'duration' => 60,
            'air_time' => '20:00',
            'status' => 'active',
        ];

        $tvShow = TvShow::create($tvShowData);

        $this->assertInstanceOf(TvShow::class, $tvShow);
        $this->assertDatabaseHas('tv_shows', $tvShowData);
    }
}