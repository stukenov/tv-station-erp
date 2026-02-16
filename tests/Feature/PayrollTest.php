public function test_payroll_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/payrolls', [
        'employee_id' => $employee->id,
        'pay_date' => '2023-10-01',
        'amount' => 1500.00,
        'status' => 'Paid',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('payrolls', [
        'employee_id' => $employee->id,
        'amount' => 1500.00,
    ]);
}