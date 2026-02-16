<?php

namespace Tests\Feature;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class StaffControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);
    }

    public function test_index_displays_staff()
    {
        $staff = Staff::factory()->create();

        $response = $this->actingAs($this->user)->get(route('staff.index'));

        $response->assertStatus(200);
        $response->assertSee($staff->name);
        $response->assertSee($staff->position);
    }

    public function test_store_creates_new_staff()
    {
        $staffData = [
            'name' => 'John Doe',
            'position' => 'Producer',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'hire_date' => '2023-01-01',
            'status' => 'active'
        ];

        $response = $this->actingAs($this->user)->post(route('staff.store'), $staffData);

        $response->assertRedirect(route('staff.index'));
        $this->assertDatabaseHas('staff', array_merge($staffData, ['hire_date' => '2023-01-01 00:00:00']));
    }

    public function test_update_modifies_existing_staff()
    {
        $staff = Staff::factory()->create();

        $updatedData = [
            'name' => 'Jane Doe',
            'position' => 'Director',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
            'hire_date' => '2023-02-01',
            'status' => 'inactive'
        ];

        $response = $this->actingAs($this->user)->put(route('staff.update', $staff), $updatedData);

        $response->assertRedirect(route('staff.index'));
        $this->assertDatabaseHas('staff', array_merge($updatedData, ['hire_date' => '2023-02-01 00:00:00']));
    }

    public function test_destroy_deletes_staff()
    {
        $staff = Staff::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('staff.destroy', $staff));

        $response->assertRedirect(route('staff.index'));
        $this->assertDatabaseMissing('staff', ['id' => $staff->id]);
    }
}