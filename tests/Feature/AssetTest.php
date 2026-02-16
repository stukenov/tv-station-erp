<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Asset;

class AssetTest extends TestCase
{
    public function test_asset_index()
    {
        $response = $this->get('/assets');
        $response->assertStatus(200);
    }

    public function test_asset_create()
    {
        $response = $this->get('/assets/create');
        $response->assertStatus(200);
    }

    public function test_asset_store()
    {
        $response = $this->post('/assets', [
            'name' => 'Test Asset',
            'value' => 5000.00,
            'purchase_date' => '2023-10-01',
        ]);

        $response->assertRedirect('/assets');
        $this->assertDatabaseHas('assets', ['name' => 'Test Asset']);
    }

    public function test_asset_update()
    {
        $asset = Asset::factory()->create();
        $response = $this->put("/assets/{$asset->id}", [
            'name' => 'Updated Asset',
            'value' => 10000.00,
            'purchase_date' => '2023-11-01',
        ]);

        $response->assertRedirect('/assets');
        $this->assertDatabaseHas('assets', ['name' => 'Updated Asset']);
    }

    public function test_asset_delete()
    {
        $asset = Asset::factory()->create();
        $response = $this->delete("/assets/{$asset->id}");

        $response->assertRedirect('/assets');
        $this->assertDatabaseMissing('assets', ['id' => $asset->id]);
    }
}
