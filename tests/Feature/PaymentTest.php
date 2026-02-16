<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Payment;
use App\Models\Invoice;

class PaymentTest extends TestCase
{
    public function test_payment_index()
    {
        $response = $this->get('/payments');
        $response->assertStatus(200);
    }

    public function test_payment_create()
    {
        $response = $this->get('/payments/create');
        $response->assertStatus(200);
    }

    public function test_payment_store()
    {
        $invoice = Invoice::factory()->create();
        $response = $this->post('/payments', [
            'invoice_id' => $invoice->id,
            'amount' => 500.00,
            'payment_date' => '2023-10-01',
        ]);

        $response->assertRedirect('/payments');
        $this->assertDatabaseHas('payments', ['amount' => 500.00]);
    }

    public function test_payment_update()
    {
        $payment = Payment::factory()->create();
        $response = $this->put("/payments/{$payment->id}", [
            'invoice_id' => $payment->invoice_id,
            'amount' => 1000.00,
            'payment_date' => '2023-10-02',
        ]);

        $response->assertRedirect('/payments');
        $this->assertDatabaseHas('payments', ['amount' => 1000.00]);
    }

    public function test_payment_delete()
    {
        $payment = Payment::factory()->create();
        $response = $this->delete("/payments/{$payment->id}");

        $response->assertRedirect('/payments');
        $this->assertDatabaseMissing('payments', ['id' => $payment->id]);
    }
}
