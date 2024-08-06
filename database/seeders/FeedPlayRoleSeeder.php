<?php

namespace Database\Seeders;

use App\Models\Feed;
use App\Models\FeedPlayRole;
use App\Models\PlayRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedPlayRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feeds = Feed::all();

        foreach ($feeds as $feed) {
            $roles = PlayRole::where('sport_id', $feed->sport_id)->pluck('id');
            
            $roleIds = $roles->random(random_int(1, $roles->count()));

            //create array of random number based on length of roleIds array
            $spotAvailability = array_map(function () {
                return random_int(1, 4);
            }, $roleIds->toArray());

            foreach ($roleIds as $index => $roleId) {
                FeedPlayRole::create([
                    'feed_id' => $feed->id,
                    'play_role_id' => $roleId,
                    'spot_availability' => $spotAvailability[$index]
                ]);
            }
        }
    }
}
