<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
                CategorySeeder::class,
                BadgeSeeder::class,
                SportSeeder::class,
                EventLocationSeeder::class,
                PlayLevelSeeder::class,
                PlayModeSeeder::class,
                PlayRoleSeeder::class,
                JoinStatusSeeder::class,
                FeedSeeder::class,
                FeedPlayRoleSeeder::class,
                //CommentSeeder::class,
                //PreferredSportSeeder::class,
                //FollowerSeeder::class,
            ]
        );
    }
}
 