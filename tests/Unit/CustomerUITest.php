public function test_customer_index_ui()
{
    $response = $this->get('/customers');
    $response->assertSee('Customers');
}

public function test_customer_create_ui()
{
    $response = $this->get('/customers/create');
    $response->assertSee('Create Customer');
}
