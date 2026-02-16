<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Expense;

class ExpenseTest extends TestCase
{
    public function test_expense_index()
    {
        $response = $this->get('/expenses');
        $response->assertStatus(200);
    }

    public function test_expense_create()
    {
        $response = $this->get('/expenses/create');
        $response->assertStatus(200);
    }

    public function test_expense_store()
    {
        $response = $this->post('/expenses', [
            'description' => 'Test Expense',
            'amount' => 100.00,
            'expense_date' => '2023-10-01',
        ]);

        $response->assertRedirect('/expenses');
        $this->assertDatabaseHas('expenses', ['description' => 'Test Expense']);
    }

    public function test_expense_update()
    {
        $expense = Expense::factory()->create();
        $response = $this->put("/expenses/{$expense->id}", [
            'description' => 'Updated Expense',
            'amount' => 200.00,
            'expense_date' => '2023-10-02',
        ]);

        $response->assertRedirect('/expenses');
        $this->assertDatabaseHas('expenses', ['description' => 'Updated Expense']);
    }

    public function test_expense_delete()
    {
        $expense = Expense::factory()->create();
        $response = $this->delete("/expenses/{$expense->id}");

        $response->assertRedirect('/expenses');
        $this->assertDatabaseMissing('expenses', ['id' => $expense->id]);
    }
}