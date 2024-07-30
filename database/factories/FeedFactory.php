<?php

namespace Database\Factories;

use App\Models\EventLocation;
use App\Models\PlayLevel;
use App\Models\PlayMode;
use App\Models\PlayRole;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feed>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sportId = Sport::inRandomOrder()->first()->id;

        return [
            'sport_id' => $sportId,
            'play_level_id' => PlayLevel::inRandomOrder()->first()->id,
            'play_mode_id' => PlayMode::where('sport_id', $sportId)->inRandomOrder()->first()->id,
            'play_role_id' => PlayRole::where('sport_id', $sportId)->inRandomOrder()->first()->id,
            'spot_availability' => rand(1, 20),
            'content' => fake()->paragraph(),
            'event_location_id' => EventLocation::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'event_date' => fake()->dateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
