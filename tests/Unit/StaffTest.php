<?php

namespace Tests\Unit;

use App\Models\Staff;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StaffTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_staff()
    {
        $staffData = [
            'name' => 'John Doe',
            'position' => 'Producer',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'hire_date' => '2023-01-01',
            'status' => 'active',
        ];

        $staff = Staff::create($staffData);

        $this->assertInstanceOf(Staff::class, $staff);
        $this->assertDatabaseHas('staff', array_merge($staffData, ['hire_date' => '2023-01-01 00:00:00']));
    }
}