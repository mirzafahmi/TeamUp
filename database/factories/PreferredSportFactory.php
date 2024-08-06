<?php

namespace Database\Factories;

use App\Models\PreferredSport;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

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
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'sport_id' => Sport::inRandomOrder()->first()->id,
        ];
    }
}
