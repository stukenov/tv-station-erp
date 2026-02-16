public function test_customer_index()
{
    $response = $this->get('/customers');
    $response->assertStatus(200);
}

public function test_customer_create()
{
    $response = $this->get('/customers/create');
    $response->assertStatus(200);
}

public function test_customer_store()
{
    $response = $this->post('/customers', [
        'name' => 'Test Customer',
        'email' => 'test@example.com',
    ]);

    $response->assertRedirect('/customers');
    $this->assertDatabaseHas('customers', ['email' => 'test@example.com']);
}

public function test_customer_update()
{
    $customer = Customer::factory()->create();
    $response = $this->put("/customers/{$customer->id}", [
        'name' => 'Updated Customer',
        'email' => 'updated@example.com',
    ]);

    $response->assertRedirect('/customers');
    $this->assertDatabaseHas('customers', ['email' => 'updated@example.com']);
}

public function test_customer_delete()
{
    $customer = Customer::factory()->create();
    $response = $this->delete("/customers/{$customer->id}");

    $response->assertRedirect('/customers');
    $this->assertDatabaseMissing('customers', ['id' => $customer->id]);
}
