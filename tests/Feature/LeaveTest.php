public function test_leave_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/leaves', [
        'employee_id' => $employee->id,
        'start_date' => '2023-10-01',
        'end_date' => '2023-10-10',
        'type' => 'Sick Leave',
        'reason' => 'Flu',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('leaves', [
        'employee_id' => $employee->id,
        'type' => 'Sick Leave',
    ]);
}