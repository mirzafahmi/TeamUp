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
            ['name' =>'Badminton', 'category' => 'Sports', 'image_format' => '.jpg'], 
            ['name' =>'Dota 2', 'category' => 'eSports', 'image_format' => '.png'], 
            ['name' => 'Football', 'category' => 'Sports', 'image_format' => '.jpeg'], 
            ['name' => 'Futsal', 'category' => 'Sports', 'image_format' => '.jpg'], 
            ['name' =>'Gray Zone Warfare', 'category' => 'eSports', 'image_format' => '.jpg'], 
            ['name' => 'Sepak Takraw', 'category' => 'Sports', 'image_format' => '.jpg'], 
            ['name' => 'Volleyball', 'category' => 'Sports', 'image_format' => '.jpeg'],  
            ['name' => 'World of Warships', 'category' => 'eSports', 'image_format' => '.jpg'],  
        ];

        foreach ($sportDetails as $key => $value){
            Sport::factory()->create([
                'name'=> $value['name'],
                'category_id' => $categories[$value['category']],
                'image' => 'sport/' . transformName($value['name']) . $value['image_format']
            ]);
        }
    }
}
