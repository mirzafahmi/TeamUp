<?php

namespace Database\Seeders;

use App\Models\JoinStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JoinStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'Approved' => 'success',
            'Pending' => 'warning',
            'Rejected' => 'danger',
        ];

        foreach ($status as $key => $value) {
            JoinStatus::factory()->create([
                'name' => $key,
                'bootstrap_tag' => $value
            ]);
        }
    }
}
