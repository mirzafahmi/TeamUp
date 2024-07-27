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

        PlayRole::factory()->create([
            'sport_id' => $sports['football'],
            'name' => 'forward'
        ]);

        PlayRole::factory()->create([
            'sport_id' => $sports['football'],
            'name' => 'midfield'
        ]);

        PlayRole::factory()->create([
            'sport_id' => $sports['dota 2'],
            'name' => 'carry'
        ]);

        PlayRole::factory()->create([
            'sport_id' => $sports['dota 2'],
            'name' => 'support'
        ]);
    }
}
