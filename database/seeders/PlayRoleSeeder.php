<?php

namespace Database\Seeders;

use App\Models\PlayRole;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = Sport::pluck('id', 'name');

        $rolesBySport = [
            'dota 2' => ['carry', 'support', 'offlane'],
            'football' => ['forwarder', 'midfielder', 'defender', 'keeper'],
            'gray zone warfare' => ['sniper', 'cqb'],
            'volleyball' => ['libero', 'setter', 'spiker']
        ];
    
        foreach ($rolesBySport as $sportName => $roles) {
            $sportId = $sports[$sportName];
            foreach ($roles as $role) {
                PlayRole::factory()->create([
                    'sport_id' => $sportId,
                    'name' => $role
                ]);
            }
        }
    }
}
