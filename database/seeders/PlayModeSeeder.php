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

        $modesBySport = [
            'Dota 2' => [
                ['name' => 'Turbo', 'team_size' => 5],
                ['name' => 'Normal', 'team_size' => 5],
                ['name' => 'Single Draft', 'team_size' => 5]
            ],
            'Football' => [
                ['name' => '11 sides', 'team_size' => 11],
                ['name' => '7 sides', 'team_size' => 7]
            ],
            'Gray Zone Warfare' => [
                ['name' => 'duo', 'team_size' => 2],
                ['name' => 'squad', 'team_size' => 4]
            ],
            'Volleyball' => [
                ['name' => 'beach', 'team_size' => 2],
                ['name' => 'indoor', 'team_size' => 6]
            ]
        ];

        foreach ($modesBySport as $sportName => $modes)
        {
            $sportId = $sports[$sportName];            
            foreach ($modes as $mode)
            {
                PlayMode::factory()->create([
                    'name' => $mode['name'],
                    'sport_id' => $sportId,
                    'team_size' => $mode['team_size']
                ]);
            }
        }
    }
}
