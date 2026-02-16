<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tax;

class TaxUITest extends TestCase
{
    public function test_tax_index_ui()
    {
        $response = $this->get('/taxes');
        $response->assertSee('Taxes');
    }

    public function test_tax_create_ui()
    {
        $response = $this->get('/taxes/create');
        $response->assertSee('Create Tax');
    }
}
