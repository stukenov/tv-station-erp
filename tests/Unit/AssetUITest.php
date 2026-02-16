<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Asset;

class AssetUITest extends TestCase
{
    public function test_asset_index_ui()
    {
        $response = $this->get('/assets');
        $response->assertSee('Assets');
    }

    public function test_asset_create_ui()
    {
        $response = $this->get('/assets/create');
        $response->assertSee('Create Asset');
    }
}
