<?php

namespace Database\Factories;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
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
            $follower_id = User::inRandomOrder()->where('id', '!=', $user_id)->first()->id;

            $exists = Follower::where('user_id', $user_id)
                ->where('follower_id', $follower_id)
                ->exists();

            if (!$exists) {
                $uniquePairFound = true;
            }
        }

        return [
            'user_id' => $user_id,
            'follower_id' => $follower_id,
        ];
    }
}
