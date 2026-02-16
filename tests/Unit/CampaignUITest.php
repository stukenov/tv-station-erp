<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Campaign;

class CampaignUITest extends TestCase
{
    public function test_campaign_index_ui()
    {
        $response = $this->get('/campaigns');
        $response->assertSee('Campaigns');
    }

    public function test_campaign_create_ui()
    {
        $response = $this->get('/campaigns/create');
        $response->assertSee('Create Campaign');
    }
}
