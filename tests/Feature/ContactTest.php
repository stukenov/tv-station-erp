<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Contact;
use App\Models\Customer;

class ContactTest extends TestCase
{
    public function test_contact_index()
    {
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }

    public function test_contact_create()
    {
        $response = $this->get('/contacts/create');
        $response->assertStatus(200);
    }

    public function test_contact_store()
    {
        $customer = Customer::factory()->create();
        $response = $this->post('/contacts', [
            'customer_id' => $customer->id,
            'name' => 'Test Contact',
            'email' => 'testcontact@example.com',
        ]);

        $response->assertRedirect('/contacts');
        $this->assertDatabaseHas('contacts', ['email' => 'testcontact@example.com']);
    }

    public function test_contact_update()
    {
        $contact = Contact::factory()->create();
        $response = $this->put("/contacts/{$contact->id}", [
            'customer_id' => $contact->customer_id,
            'name' => 'Updated Contact',
            'email' => 'updatedcontact@example.com',
        ]);

        $response->assertRedirect('/contacts');
        $this->assertDatabaseHas('contacts', ['email' => 'updatedcontact@example.com']);
    }

    public function test_contact_delete()
    {
        $contact = Contact::factory()->create();
        $response = $this->delete("/contacts/{$contact->id}");

        $response->assertRedirect('/contacts');
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
