<?php

namespace Tests\Unit;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ActivityTest extends TestCase
{
    use RefreshDatabase;
   /** @test */
   public function it_can_create_an_activity()
   {
        $activity = Activity::create([
            'activity_name' => 'Tree Planting',
            'volunteer_count' => 50,
            'domicile' => 'Park',
            'rally_point' => 'Main Gate',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-01',
            'start_time' => '08:00:00',
            'end_time' => '12:00:00',
            'task' => 'Plant trees around the park',
            'criteria' => 'Must be above 18',
            'registration_limit' => '2024-05-30',
        ]);

        $this->assertDatabaseHas('activities', [
            'activity_name' => 'Tree Planting',
        ]);

        $this->assertEquals('Tree Planting', $activity->activity_name);
        $this->assertEquals(50, $activity->volunteer_count);
        $this->assertEquals('Park', $activity->domicile);
        }

        /** @test */
        public function it_casts_dates_and_times_properly()
        {
        $activity = Activity::create([
            'activity_name' => 'Tree Planting',
            'volunteer_count' => 50,
            'domicile' => 'Park',
            'rally_point' => 'Main Gate',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-01',
            'start_time' => '08:00:00',
            'end_time' => '12:00:00',
            'task' => 'Plant trees around the park',
            'criteria' => 'Must be above 18',
            'registration_limit' => '2024-05-30',
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $activity->start_date);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $activity->end_date);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $activity->start_time);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $activity->end_time);
}
}
