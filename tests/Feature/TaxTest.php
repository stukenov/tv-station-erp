<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tax;

class TaxTest extends TestCase
{
    public function test_tax_index()
    {
        $response = $this->get('/taxes');
        $response->assertStatus(200);
    }

    public function test_tax_create()
    {
        $response = $this->get('/taxes/create');
        $response->assertStatus(200);
    }

    public function test_tax_store()
    {
        $response = $this->post('/taxes', [
            'name' => 'Test Tax',
            'rate' => 15.00,
        ]);

        $response->assertRedirect('/taxes');
        $this->assertDatabaseHas('taxes', ['name' => 'Test Tax']);
    }

    public function test_tax_update()
    {
        $tax = Tax::factory()->create();
        $response = $this->put("/taxes/{$tax->id}", [
            'name' => 'Updated Tax',
            'rate' => 20.00,
        ]);

        $response->assertRedirect('/taxes');
        $this->assertDatabaseHas('taxes', ['name' => 'Updated Tax']);
    }

    public function test_tax_delete()
    {
        $tax = Tax::factory()->create();
        $response = $this->delete("/taxes/{$tax->id}");

        $response->assertRedirect('/taxes');
        $this->assertDatabaseMissing('taxes', ['id' => $tax->id]);
    }
}
