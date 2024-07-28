<?php

namespace Database\Seeders;

use App\Models\Feed;
use Database\Factories\FeedFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feed::factory()->count(10)->create();
    }
}
