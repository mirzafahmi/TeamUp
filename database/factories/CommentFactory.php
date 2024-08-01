<?php

namespace Database\Factories;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feed_id' => Feed::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => fake()->paragraph(),
        ];
    }
}
