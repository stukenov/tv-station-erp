<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Campaign;

class CampaignTest extends TestCase
{
    public function test_campaign_index()
    {
        $response = $this->get('/campaigns');
        $response->assertStatus(200);
    }

    public function test_campaign_create()
    {
        $response = $this->get('/campaigns/create');
        $response->assertStatus(200);
    }

    public function test_campaign_store()
    {
        $response = $this->post('/campaigns', [
            'name' => 'Test Campaign',
            'start_date' => '2023-10-01',
            'end_date' => '2023-10-31',
        ]);

        $response->assertRedirect('/campaigns');
        $this->assertDatabaseHas('campaigns', ['name' => 'Test Campaign']);
    }

    public function test_campaign_update()
    {
        $campaign = Campaign::factory()->create();
        $response = $this->put("/campaigns/{$campaign->id}", [
            'name' => 'Updated Campaign',
            'start_date' => '2023-11-01',
            'end_date' => '2023-11-30',
        ]);

        $response->assertRedirect('/campaigns');
        $this->assertDatabaseHas('campaigns', ['name' => 'Updated Campaign']);
    }

    public function test_campaign_delete()
    {
        $campaign = Campaign::factory()->create();
        $response = $this->delete("/campaigns/{$campaign->id}");

        $response->assertRedirect('/campaigns');
        $this->assertDatabaseMissing('campaigns', ['id' => $campaign->id]);
    }
}
