<?php

namespace Tests\Unit;

use App\Models\Schedule;
use App\Models\TvShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_schedule()
    {
        $tvShow = TvShow::factory()->create();
        $scheduleData = [
            'tv_show_id' => $tvShow->id,
            'start_time' => '2024-09-05 20:00:00',
            'end_time' => '2024-09-05 21:00:00',
            'day_of_week' => 'Monday'
        ];

        $schedule = Schedule::create($scheduleData);

        $this->assertInstanceOf(Schedule::class, $schedule);
        $this->assertDatabaseHas('schedules', $scheduleData);
    }

    public function test_schedule_belongs_to_tv_show()
    {
        $tvShow = TvShow::factory()->create();
        $schedule = Schedule::factory()->create(['tv_show_id' => $tvShow->id]);

        $this->assertInstanceOf(TvShow::class, $schedule->tvShow);
        $this->assertEquals($tvShow->id, $schedule->tvShow->id);
    }
}