<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Invoice;
use App\Models\Customer;

class InvoiceTest extends TestCase
{
    public function test_invoice_index()
    {
        $response = $this->get('/invoices');
        $response->assertStatus(200);
    }

    public function test_invoice_create()
    {
        $response = $this->get('/invoices/create');
        $response->assertStatus(200);
    }

    public function test_invoice_store()
    {
        $customer = Customer::factory()->create();
        $response = $this->post('/invoices', [
            'customer_id' => $customer->id,
            'amount' => 500.00,
            'invoice_date' => '2023-10-01',
            'due_date' => '2023-10-31',
        ]);

        $response->assertRedirect('/invoices');
        $this->assertDatabaseHas('invoices', ['amount' => 500.00]);
    }

    public function test_invoice_update()
    {
        $invoice = Invoice::factory()->create();
        $response = $this->put("/invoices/{$invoice->id}", [
            'customer_id' => $invoice->customer_id,
            'amount' => 1000.00,
            'invoice_date' => '2023-10-02',
            'due_date' => '2023-11-01',
        ]);

        $response->assertRedirect('/invoices');
        $this->assertDatabaseHas('invoices', ['amount' => 1000.00]);
    }

    public function test_invoice_delete()
    {
        $invoice = Invoice::factory()->create();
        $response = $this->delete("/invoices/{$invoice->id}");

        $response->assertRedirect('/invoices');
        $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
    }
}
