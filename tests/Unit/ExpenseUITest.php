<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Expense;

class ExpenseUITest extends TestCase
{
    public function test_expense_index_ui()
    {
        $response = $this->get('/expenses');
        $response->assertSee('Expenses');
    }

    public function test_expense_create_ui()
    {
        $response = $this->get('/expenses/create');
        $response->assertSee('Create Expense');
    }
}
