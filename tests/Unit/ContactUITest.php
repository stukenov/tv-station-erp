public function test_contact_index_ui()
{
    $response = $this->get('/contacts');
    $response->assertSee('Contacts');
}

public function test_contact_create_ui()
{
    $response = $this->get('/contacts/create');
    $response->assertSee('Create Contact');
}
