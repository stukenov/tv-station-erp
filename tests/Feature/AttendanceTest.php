public function test_attendance_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/attendances', [
        'employee_id' => $employee->id,
        'date' => '2023-10-01',
        'check_in' => '09:00:00',
        'check_out' => '17:00:00',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('attendances', [
        'employee_id' => $employee->id,
        'date' => '2023-10-01',
    ]);
}