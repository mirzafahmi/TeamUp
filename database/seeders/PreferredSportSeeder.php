<?php

namespace Database\Seeders;

use App\Models\PreferredSport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferredSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PreferredSport::factory()->count(20)->create();
    }
}
