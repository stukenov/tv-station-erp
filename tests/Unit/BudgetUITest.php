<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Budget;

class BudgetUITest extends TestCase
{
    public function test_budget_index_ui()
    {
        $response = $this->get('/budgets');
        $response->assertSee('Budgets');
    }

    public function test_budget_create_ui()
    {
        $response = $this->get('/budgets/create');
        $response->assertSee('Create Budget');
    }
}
