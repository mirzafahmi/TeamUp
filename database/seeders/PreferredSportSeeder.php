<?php

namespace Database\Seeders;

use App\Models\PreferredSport;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferredSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uniqueRecords = collect();

        while ($uniqueRecords->count() < 20) {
            $user_id = User::inRandomOrder()->first()->id;
            $sport_id = Sport::inRandomOrder()->first()->id;

            if (!PreferredSport::where('user_id', $user_id)->where('sport_id', $sport_id)->exists()) {
                $uniqueRecords->push([
                    'user_id' => $user_id,
                    'sport_id' => $sport_id,
                ]);
            }
        }

        foreach ($uniqueRecords as $record) {
            PreferredSport::create($record);
        }
    }
}
