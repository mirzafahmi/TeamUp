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
            'Veteran' => 'Created at least 50 feeds',
            'Comunity Leader' => 'Reached at least 50 follower',
            'Enthusiast' => 'Have more than 4 preferred sports',
            'Versatile' => 'Played more that 4 roles in any sport',
            'Social butterfly' => 'Commented at least 50 comments',
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
