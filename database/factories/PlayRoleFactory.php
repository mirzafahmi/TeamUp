<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayRole>
 */
class PlayRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sport_id' => Sport::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'description' => fake()->paragraph()
        ];
    }
}
