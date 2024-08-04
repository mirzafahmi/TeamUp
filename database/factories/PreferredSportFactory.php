<?php

namespace Database\Factories;

use App\Models\PreferredSport;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreferredSport>
 */
class PreferredSportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniquePairFound = false;

        while (!$uniquePairFound) {

            $user_id = User::inRandomOrder()->first()->id;
            $sport_id = Sport::inRandomOrder()->first()->id;

            $exists = PreferredSport::where('user_id', $user_id)
                ->where('sport_id', $sport_id)
                ->exists();

            if (!$exists) {
                $uniquePairFound = true;
            } 
        }

        return [
            'user_id' => $user_id,
            'sport_id' => $sport_id,
        ];
    }
}
