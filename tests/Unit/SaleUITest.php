<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Sale;

class SaleUITest extends TestCase
{
    public function test_sale_index_ui()
    {
        $response = $this->get('/sales');
        $response->assertSee('Sales');
    }

    public function test_sale_create_ui()
    {
        $response = $this->get('/sales/create');
        $response->assertSee('Create Sale');
    }
}
