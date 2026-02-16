public function test_performance_review_creation()
{
    $employee = \App\Models\Employee::factory()->create();

    $response = $this->post('/performance_reviews', [
        'employee_id' => $employee->id,
        'review_date' => '2023-10-01',
        'comments' => 'Excellent performance',
        'rating' => 5,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('performance_reviews', [
        'employee_id' => $employee->id,
        'comments' => 'Excellent performance',
    ]);
}