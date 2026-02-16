<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Budget;

class BudgetTest extends TestCase
{
    public function test_budget_index()
    {
        $response = $this->get('/budgets');
        $response->assertStatus(200);
    }

    public function test_budget_create()
    {
        $response = $this->get('/budgets/create');
        $response->assertStatus(200);
    }

    public function test_budget_store()
    {
        $response = $this->post('/budgets', [
            'name' => 'Test Budget',
            'amount' => 5000.00,
            'start_date' => '2023-10-01',
            'end_date' => '2023-12-31',
        ]);

        $response->assertRedirect('/budgets');
        $this->assertDatabaseHas('budgets', ['name' => 'Test Budget']);
    }

    public function test_budget_update()
    {
        $budget = Budget::factory()->create();
        $response = $this->put("/budgets/{$budget->id}", [
            'name' => 'Updated Budget',
            'amount' => 10000.00,
            'start_date' => '2023-11-01',
            'end_date' => '2024-01-31',
        ]);

        $response->assertRedirect('/budgets');
        $this->assertDatabaseHas('budgets', ['name' => 'Updated Budget']);
    }

    public function test_budget_delete()
    {
        $budget = Budget::factory()->create();
        $response = $this->delete("/budgets/{$budget->id}");

        $response->assertRedirect('/budgets');
        $this->assertDatabaseMissing('budgets', ['id' => $budget->id]);
    }
}
