<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Inventory;

class InventoryTest extends TestCase
{
    public function test_inventory_index()
    {
        $response = $this->get('/inventories');
        $response->assertStatus(200);
    }

    public function test_inventory_create()
    {
        $response = $this->get('/inventories/create');
        $response->assertStatus(200);
    }

    public function test_inventory_store()
    {
        $response = $this->post('/inventories', [
            'name' => 'Test Inventory',
            'quantity' => 10,
            'price' => 100.00,
        ]);

        $response->assertRedirect('/inventories');
        $this->assertDatabaseHas('inventories', ['name' => 'Test Inventory']);
    }

    public function test_inventory_update()
    {
        $inventory = Inventory::factory()->create();
        $response = $this->put("/inventories/{$inventory->id}", [
            'name' => 'Updated Inventory',
            'quantity' => 20,
            'price' => 200.00,
        ]);

        $response->assertRedirect('/inventories');
        $this->assertDatabaseHas('inventories', ['name' => 'Updated Inventory']);
    }

    public function test_inventory_delete()
    {
        $inventory = Inventory::factory()->create();
        $response = $this->delete("/inventories/{$inventory->id}");

        $response->assertRedirect('/inventories');
        $this->assertDatabaseMissing('inventories', ['id' => $inventory->id]);
    }
}
