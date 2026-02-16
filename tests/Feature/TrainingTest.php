public function test_training_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/trainings', [
        'employee_id' => $employee->id,
        'title' => 'Leadership Training',
        'start_date' => '2023-10-01',
        'end_date' => '2023-10-05',
        'description' => 'Training on leadership skills',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('trainings', [
        'employee_id' => $employee->id,
        'title' => 'Leadership Training',
    ]);
}