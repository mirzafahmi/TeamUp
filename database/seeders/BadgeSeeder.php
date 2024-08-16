<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = [
            'Getting Started' => 'Created at least 1 feeds',
            'Veteran' => 'Created at least 5 feeds',
            'Community Leader' => 'Reached at least 5 follower',
            'Enthusiast' => 'Have at least 4 preferred sports',
            'Versatile' => 'Played at least 4 roles in any sport',
            'Social Butterfly' => 'Commented at least 5 comments',
        ];

        foreach ($badges as $name => $description) 
        {
            Badge::factory()->create([
                'name' => $name,
                'description' => $description,
                'image' => 'badge/' . transformName($name) . '.png'
            ]);
        }
    }
}
