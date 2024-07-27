<?php

namespace Database\Seeders;

use App\Models\PlayMode;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = Sport::pluck('id', 'name');

        PlayMode::factory()->create([
            'name' => 'turbo',
            'sport_id' => $sports['dota 2'],
            'team_size' => 5
        ]);

        PlayMode::factory()->create([
            'name' => 'duo',
            'sport_id' => $sports['gray zone warfare'],
            'team_size' => 2
        ]);

        PlayMode::factory()->create([
            'name' => 'squad',
            'sport_id' => $sports['gray zone warfare'],
            'team_size' => 4
        ]);

        PlayMode::factory()->create([
            'name' => '11 sides',
            'sport_id' => $sports['football'],
            'team_size' => 11
        ]);

        PlayMode::factory()->create([
            'name' => '7 sides',
            'sport_id' => $sports['football'],
            'team_size' => 7
        ]);
    }
}
