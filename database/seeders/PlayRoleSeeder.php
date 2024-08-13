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
            'Badminton' => ['Attacker', 'Defender'],
            'Dota 2' => ['Carry', 'Soft-Support', 'Offlane', 'Midlaner', 'Hard-Support'],
            'Football' => ['Forwarder', 'Midfielder', 'Defender', 'Keeper'],
            'Futsal' => ['Forwarder', 'Midfielder', 'Defender', 'Keeper'],
            'Gray Zone Warfare' => ['sniper', 'cqb'],
            'Sepak Takraw' => ['Tekong', 'Feeder', 'Striker'],
            'Volleyball' => ['Libero', 'Setter', 'Spiker'],
            'World of Warships' => ['Aircraft Carrier', 'Battleship', 'Cruiser', 'Destroyer', 'Submarine'],
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
