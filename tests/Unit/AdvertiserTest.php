<?php

namespace Tests\Unit;

use App\Models\Advertiser;
use App\Models\Advertisement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdvertiserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_advertiser()
    {
        $advertiserData = [
            'name' => 'Test Advertiser',
            'contact_person' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'address' => '123 Test St, Test City, 12345',
        ];

        $advertiser = Advertiser::create($advertiserData);

        $this->assertInstanceOf(Advertiser::class, $advertiser);
        $this->assertDatabaseHas('advertisers', $advertiserData);
    }

    public function test_advertiser_has_many_advertisements()
    {
        $advertiser = Advertiser::factory()->create();
        $advertisement = Advertisement::factory()->create(['advertiser_id' => $advertiser->id]);

        $this->assertTrue($advertiser->advertisements->contains($advertisement));
        $this->assertEquals(1, $advertiser->advertisements->count());
    }
}