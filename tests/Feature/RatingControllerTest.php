<?php

namespace Tests\Feature;

use App\Models\Rating;
use App\Models\TvShow;
use App\Models\User;  // Add this line
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_index_displays_ratings()
    {
        $rating = Rating::factory()->create();

        $response = $this->get(route('ratings.index'));

        $response->assertStatus(200);
        $response->assertSee($rating->tvShow->title);
        $response->assertSee($rating->date->format('Y-m-d'));
    }

    public function test_store_creates_new_rating()
    {
        $tvShow = TvShow::factory()->create();

        $ratingData = [
            'tv_show_id' => $tvShow->id,
            'date' => '2023-04-19',
            'viewers' => 1000000,
            'rating_value' => 8.5,
            'audience_share' => 25.5,
        ];

        $response = $this->post(route('ratings.store'), $ratingData);

        $response->assertRedirect(route('ratings.index'));
        $this->assertDatabaseHas('ratings', array_merge($ratingData, ['date' => '2023-04-19 00:00:00']));
    }

    public function test_update_modifies_existing_rating()
    {
        $rating = Rating::factory()->create();

        $updatedData = [
            'tv_show_id' => $rating->tv_show_id,
            'date' => '2023-04-20',
            'viewers' => 1500000,
            'rating_value' => 9.0,
            'audience_share' => 30.5,
        ];

        $response = $this->put(route('ratings.update', $rating), $updatedData);

        $response->assertRedirect(route('ratings.index'));
        $this->assertDatabaseHas('ratings', array_merge($updatedData, ['date' => '2023-04-20 00:00:00']));
    }

    public function test_destroy_deletes_rating()
    {
        $rating = Rating::factory()->create();

        $response = $this->delete(route('ratings.destroy', $rating));

        $response->assertRedirect(route('ratings.index'));
        $this->assertDatabaseMissing('ratings', ['id' => $rating->id]);
    }
}