<?php

namespace Database\Seeders;

use App\Models\PlayLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playLevels = ['unranked', 'tournament', 'casual', 'training', 'co-op', 'sandbox'];
        
        foreach ($playLevels as $playLevel)
        {
            PlayLevel::factory()->create([
                'name' => $playLevel
            ]);
        }
    }
}
