<?php

namespace Tests\Unit;

use App\Models\Rating;
use App\Models\TvShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_rating()
    {
        $tvShow = TvShow::factory()->create();

        $ratingData = [
            'tv_show_id' => $tvShow->id,
            'date' => '2023-04-19',
            'viewers' => 1000000,
            'rating_value' => 8.5,
            'audience_share' => 25.5,
        ];

        $rating = Rating::create($ratingData);

        $this->assertInstanceOf(Rating::class, $rating);
        $this->assertDatabaseHas('ratings', [
            'tv_show_id' => $tvShow->id,
            'date' => '2023-04-19 00:00:00',
            'viewers' => 1000000,
            'rating_value' => 8.5,
            'audience_share' => 25.5,
        ]);
    }

    public function test_rating_belongs_to_tv_show()
    {
        $tvShow = TvShow::factory()->create();
        $rating = Rating::factory()->create(['tv_show_id' => $tvShow->id]);

        $this->assertInstanceOf(TvShow::class, $rating->tvShow);
        $this->assertEquals($tvShow->id, $rating->tvShow->id);
    }
}