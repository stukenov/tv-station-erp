public function test_benefit_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/benefits', [
        'employee_id' => $employee->id,
        'type' => 'Health Insurance',
        'start_date' => '2023-10-01',
        'end_date' => '2024-10-01',
        'description' => 'Comprehensive health insurance plan',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('benefits', [
        'employee_id' => $employee->id,
        'type' => 'Health Insurance',
    ]);
}