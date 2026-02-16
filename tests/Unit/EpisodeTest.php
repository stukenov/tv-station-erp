<?php

namespace Tests\Unit;

use App\Models\Episode;
use App\Models\TvShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EpisodeTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_episode()
    {
        $tvShow = TvShow::factory()->create();
        $episodeData = [
            'tv_show_id' => $tvShow->id,
            'title' => 'Test Episode',
            'description' => 'This is a test episode',
            'season_number' => 1,
            'episode_number' => 1,
            'air_date' => '2023-04-16 00:00:00',
            'duration' => 30,
        ];

        $episode = Episode::factory()->create($episodeData);

        $this->assertInstanceOf(Episode::class, $episode);
        $this->assertDatabaseHas('episodes', $episodeData);
    }

    public function test_episode_belongs_to_tv_show()
    {
        $tvShow = TvShow::factory()->create();
        $episode = Episode::factory()->create(['tv_show_id' => $tvShow->id]);

        $this->assertInstanceOf(TvShow::class, $episode->tvShow);
        $this->assertEquals($tvShow->id, $episode->tvShow->id);
    }
}