<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Procurement;

class ProcurementTest extends TestCase
{
    public function test_procurement_index()
    {
        $response = $this->get('/procurements');
        $response->assertStatus(200);
    }

    public function test_procurement_create()
    {
        $response = $this->get('/procurements/create');
        $response->assertStatus(200);
    }

    public function test_procurement_store()
    {
        $response = $this->post('/procurements', [
            'item_name' => 'Test Item',
            'quantity' => 10,
            'price' => 100.00,
            'procurement_date' => '2023-10-01',
        ]);

        $response->assertRedirect('/procurements');
        $this->assertDatabaseHas('procurements', ['item_name' => 'Test Item']);
    }

    public function test_procurement_update()
    {
        $procurement = Procurement::factory()->create();
        $response = $this->put("/procurements/{$procurement->id}", [
            'item_name' => 'Updated Item',
            'quantity' => 20,
            'price' => 200.00,
            'procurement_date' => '2023-11-01',
        ]);

        $response->assertRedirect('/procurements');
        $this->assertDatabaseHas('procurements', ['item_name' => 'Updated Item']);
    }

    public function test_procurement_delete()
    {
        $procurement = Procurement::factory()->create();
        $response = $this->delete("/procurements/{$procurement->id}");

        $response->assertRedirect('/procurements');
        $this->assertDatabaseMissing('procurements', ['id' => $procurement->id]);
    }
}
