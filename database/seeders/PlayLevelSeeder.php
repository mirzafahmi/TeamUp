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
        PlayLevel::factory()->create([
            'name' => 'ranked'
        ]);

        PlayLevel::factory()->create([
            'name' => 'unranked'
        ]);

        PlayLevel::factory()->create([
            'name' => 'tournament'
        ]);

        PlayLevel::factory()->create([
            'name' => 'casual'
        ]);

        PlayLevel::factory()->create([
            'name' => 'training'
        ]);

        PlayLevel::factory()->create([
            'name' => 'co-op'
        ]);

        PlayLevel::factory()->create([
            'name' => 'sandbox'
        ]);
    }
}
