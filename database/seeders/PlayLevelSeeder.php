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
        $playLevels = ['Unranked', 'Tournament', 'Casual', 'Training', 'Co-op', 'Sandbox'];
        
        foreach ($playLevels as $playLevel)
        {
            PlayLevel::factory()->create([
                'name' => $playLevel
            ]);
        }
    }
}
