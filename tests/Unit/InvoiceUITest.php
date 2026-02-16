<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Invoice;

class InvoiceUITest extends TestCase
{
    public function test_invoice_index_ui()
    {
        $response = $this->get('/invoices');
        $response->assertSee('Invoices');
    }

    public function test_invoice_create_ui()
    {
        $response = $this->get('/invoices/create');
        $response->assertSee('Create Invoice');
    }
}
