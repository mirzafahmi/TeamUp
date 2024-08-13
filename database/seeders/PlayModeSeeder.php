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
            'Badminton' => [
                ['name' => 'Singles', 'team_size' => 1],
                ['name' => 'Doubles', 'team_size' => 2],
                ['name' => 'Mix Doubles', 'team_size' => 2],
                ['name' => 'Teams', 'team_size' => 7]
            ],
            'Dota 2' => [
                ['name' => 'Turbo', 'team_size' => 5],
                ['name' => 'Normal', 'team_size' => 5],
                ['name' => 'Single Draft', 'team_size' => 5]
            ],
            'Football' => [
                ['name' => '11 sides', 'team_size' => 11],
                ['name' => '7 sides', 'team_size' => 7]
            ],
            'Futsal' => [
                ['name' => '5 sides', 'team_size' => 5],
            ],
            'Gray Zone Warfare' => [
                ['name' => 'Duo', 'team_size' => 2],
                ['name' => 'Squad', 'team_size' => 4]
            ],
            'Sepak Takraw' => [
                ['name' => 'Teams', 'team_size' => 3],
                ['name' => 'Regu', 'team_size' => 2]
            ],
            'Volleyball' => [
                ['name' => 'Beach', 'team_size' => 2],
                ['name' => 'Indoor', 'team_size' => 6]
            ],
            'World of Warships' => [
                ['name' => 'Co-op', 'team_size' => 9],
                ['name' => 'Random Battle', 'team_size' => 12],
                ['name' => 'Scenario', 'team_size' => 7],
                ['name' => 'Clan Battle', 'team_size' => 7],
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
