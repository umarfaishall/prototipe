<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityFeatureTest extends TestCase
{
    use RefreshDatabase;

      /** @test */
      public function it_can_create_an_activity_via_http_request()
      {
          $response = $this->post('/admin/aktivitas/store', [
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

          $response->assertStatus(201);
          $this->assertDatabaseHas('activities', [
              'activity_name' => 'Tree Planting',
          ]);
      }
}
