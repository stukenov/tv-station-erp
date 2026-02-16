<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sale;
use App\Models\Customer;

class SaleTest extends TestCase
{
    public function test_sale_index()
    {
        $response = $this->get('/sales');
        $response->assertStatus(200);
    }

    public function test_sale_create()
    {
        $response = $this->get('/sales/create');
        $response->assertStatus(200);
    }

    public function test_sale_store()
    {
        $customer = Customer::factory()->create();
        $response = $this->post('/sales', [
            'customer_id' => $customer->id,
            'amount' => 500.00,
            'sale_date' => '2023-10-01',
        ]);

        $response->assertRedirect('/sales');
        $this->assertDatabaseHas('sales', ['amount' => 500.00]);
    }

    public function test_sale_update()
    {
        $sale = Sale::factory()->create();
        $response = $this->put("/sales/{$sale->id}", [
            'customer_id' => $sale->customer_id,
            'amount' => 1000.00,
            'sale_date' => '2023-10-02',
        ]);

        $response->assertRedirect('/sales');
        $this->assertDatabaseHas('sales', ['amount' => 1000.00]);
    }

    public function test_sale_delete()
    {
        $sale = Sale::factory()->create();
        $response = $this->delete("/sales/{$sale->id}");

        $response->assertRedirect('/sales');
        $this->assertDatabaseMissing('sales', ['id' => $sale->id]);
    }
}
