<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Activity::create([
                'activity_name' => 'Tree Planting',
                'volunteer_count' => 50,
                'domicile' => 'Park',
                'rally_point' => 'Main Gate',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-10',
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
                'task' => 'Plant trees around the park',
                'criteria' => 'Must be above 18',
                'registration_limit' => '2024-05-30',
                'status' => 'open'
            ]);
        }
    }
}
