<?php

namespace Tests\Unit;

use App\Models\Advertisement;
use App\Models\Advertiser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_advertisement()
    {
        $advertiser = Advertiser::factory()->create();
        $advertisementData = [
            'advertiser_id' => $advertiser->id,
            'title' => 'Test Advertisement',
            'duration' => 30,
            'content' => 'This is a test advertisement',
            'start_date' => '2023-05-01 00:00:00',
            'end_date' => '2023-05-31 00:00:00'
        ];

        $advertisement = Advertisement::factory()->create($advertisementData);

        $this->assertInstanceOf(Advertisement::class, $advertisement);
        $this->assertDatabaseHas('advertisements', $advertisementData);
    }

    public function test_advertisement_belongs_to_advertiser()
    {
        $advertiser = Advertiser::factory()->create();
        $advertisement = Advertisement::factory()->create(['advertiser_id' => $advertiser->id]);

        $this->assertInstanceOf(Advertiser::class, $advertisement->advertiser);
        $this->assertEquals($advertiser->id, $advertisement->advertiser->id);
    }
}