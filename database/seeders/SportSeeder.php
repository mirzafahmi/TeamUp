<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sport;
use Database\Factories\SportFactory;
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

        $sportDetails = [
            ['name' => 'football', 'category' => 'sports', 'image_format' => '.jpeg'], 
            ['name' => 'volleyball', 'category' => 'sports', 'image_format' => '.jpeg'],  
            ['name' =>'dota 2', 'category' => 'esports', 'image_format' => '.png'], 
            ['name' =>'gray zone warfare', 'category' => 'esports', 'image_format' => '.jpg'], 
        ];

        foreach ($sportDetails as $key => $value){
            Sport::factory()->create([
                'name'=> $value['name'],
                'category_id' => $categories[$value['category']],
                'image' => 'sport/' . str_replace(' ', '_', $value['name']) . $value['image_format']
            ]);
        }
    }
}
