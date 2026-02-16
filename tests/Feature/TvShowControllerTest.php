<?php

namespace Tests\Feature;

use App\Models\TvShow;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TvShowControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_index_displays_tv_shows()
    {
        $tvShow = TvShow::factory()->create();

        $response = $this->actingAs($this->user)->get(route('tv_shows.index'));

        $response->assertStatus(200);
        $response->assertSee($tvShow->title);
    }

    public function test_store_creates_new_tv_show()
    {
        $tvShowData = [
            'title' => 'New Test Show',
            'description' => 'This is a new test show',
            'genre' => 'Comedy',
            'duration' => 30,
            'air_time' => '19:30',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->user)->post(route('tv_shows.store'), $tvShowData);

        $response->assertRedirect(route('tv_shows.index'));
        $this->assertDatabaseHas('tv_shows', $tvShowData);
    }

    public function test_update_modifies_existing_tv_show()
    {
        $tvShow = TvShow::factory()->create();
        $updatedData = [
            'title' => 'Updated Test Show',
            'description' => 'This is an updated test show',
            'genre' => 'Drama',
            'duration' => 45,
            'air_time' => '21:00',
            'status' => 'inactive',
        ];

        $response = $this->actingAs($this->user)->put(route('tv_shows.update', $tvShow), $updatedData);

        $response->assertRedirect(route('tv_shows.index'));
        $this->assertDatabaseHas('tv_shows', $updatedData);
    }

    public function test_destroy_deletes_tv_show()
    {
        $tvShow = TvShow::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('tv_shows.destroy', $tvShow));

        $response->assertRedirect(route('tv_shows.index'));
        $this->assertDatabaseMissing('tv_shows', ['id' => $tvShow->id]);
    }
}