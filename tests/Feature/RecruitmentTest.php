public function test_recruitment_creation()
{
    $response = $this->post('/recruitments', [
        'position' => 'Software Engineer',
        'application_date' => '2023-10-01',
        'status' => 'Pending',
        'notes' => 'Initial application received',
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('recruitments', [
        'position' => 'Software Engineer',
        'status' => 'Pending',
    ]);
}