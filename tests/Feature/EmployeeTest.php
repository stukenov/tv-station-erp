public function test_employee_creation()
{
    $response = $this->post('/employees', [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'position' => 'Developer',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('employees', [
        'email' => 'john.doe@example.com',
    ]);
}