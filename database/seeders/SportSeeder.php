<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name')->toArray();

        Sport::factory()->create([
            'name' => 'football',
            'category_id' => $categories['sports'],
        ]);

        Sport::factory()->create([
            'name' => 'volleyball',
            'category_id' => $categories['sports'],
        ]);

        Sport::factory()->create([
            'name' => 'dota 2',
            'category_id' => $categories['esports'],
        ]);

        Sport::factory()->create([
            'name' => 'gray zone warfare',
            'category_id' => $categories['sports'],
        ]);
    }
}
