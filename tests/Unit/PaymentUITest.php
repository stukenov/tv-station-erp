<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Payment;

class PaymentUITest extends TestCase
{
    public function test_payment_index_ui()
    {
        $response = $this->get('/payments');
        $response->assertSee('Payments');
    }

    public function test_payment_create_ui()
    {
        $response = $this->get('/payments/create');
        $response->assertSee('Create Payment');
    }
}
