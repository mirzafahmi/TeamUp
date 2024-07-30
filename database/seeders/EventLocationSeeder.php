<?php

namespace Database\Seeders;

use App\Models\EventLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventLocation::factory()->create([
            'name' => 'Home',
            'address' => 'Your Own PO Box Address',
            'map_link' => '127.0.0.1'
        ]);
        
        EventLocation::factory()->count(10)->create();
    }
}
