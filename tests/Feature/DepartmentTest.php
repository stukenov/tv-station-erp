public function test_department_creation()
{
    $response = $this->post('/departments', [
        'name' => 'IT Department',
        'description' => 'Handles all IT related tasks',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('departments', [
        'name' => 'IT Department',
    ]);
}