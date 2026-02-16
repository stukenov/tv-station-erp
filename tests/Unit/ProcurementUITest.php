<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Procurement;

class ProcurementUITest extends TestCase
{
    public function test_procurement_index_ui()
    {
        $response = $this->get('/procurements');
        $response->assertSee('Procurements');
    }

    public function test_procurement_create_ui()
    {
        $response = $this->get('/procurements/create');
        $response->assertSee('Create Procurement');
    }
}
