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
            'Getting Started',
            'Veteran',
            'Comunity Leader',
            'Enthusiast',
            'Versatile',
            'Social butterfly',
        ];

        foreach ($badges as $badge) 
        {
            Badge::factory()->create([
                'name' => $badge,
                'image' => 'badge/' . str_replace(' ', '_', $badge) . 'png'
            ]);
        }
    }
}
