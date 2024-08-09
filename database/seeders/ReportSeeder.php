<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = ['Scam', 'Not-Punctual'];

        foreach ($reports as $report) {
            Report::factory()->create([
                'name' => $report
            ]);
        }
    }
}
