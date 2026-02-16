<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Inventory;

class InventoryUITest extends TestCase
{
    public function test_inventory_index_ui()
    {
        $response = $this->get('/inventories');
        $response->assertSee('Inventories');
    }

    public function test_inventory_create_ui()
    {
        $response = $this->get('/inventories/create');
        $response->assertSee('Create Inventory');
    }
}
