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
        $locations = [
            'Home' => [
                'address' => 'Your Own PO Box Address',
                'map_link' => 'http://127.0.0.1'
            ],
            'Old Trafford Stadium' => [
                'address' => 'Sir Matt Busby Way, Old Trafford, Stretford, Manchester M16 0RA, United Kingdom',
                'map_link' => 'https://www.google.com/maps/place/Old+Trafford/@53.4630589,-2.293915,17z/data=!3m1!4b1!4m6!3m5!1s0x487bae72e7e47f69:0x6c930e96df4455fe!8m2!3d53.4630589!4d-2.2913401!16zL20vMDMwbHBs?entry=ttu'
            ],
            'Estadio Bernabeu' => [
                'address' => 'Av. de Concha Espina, 1, Chamartín, 28036 Madrid, Spain',
                'map_link' => 'https://www.google.com/maps/place/Santiago+Bernab%C3%A9u+Stadium/@40.4367713,-3.717399,14z/data=!4m10!1m2!2m1!1sestadio+bernabeu!3m6!1s0xd4228e23705d39f:0xa8fff6d26e2b1988!8m2!3d40.4530387!4d-3.6883337!15sChBlc3RhZGlvIGJlcm5hYmV1WhIiEGVzdGFkaW8gYmVybmFiZXWSAQVhcmVuYeABAA!16zL20vMDFneGx0?entry=ttu',
            ],
            'IIUM Kuantan Sport Complex' => [
                'address' => 'Jln Bypass Kuantan, 25300 Kuantan, Pahang',
                'map_link' => 'https://www.google.com/maps/place/IIUM+Kuantan+Sports+Complex/@3.8532421,103.3122848,17z/data=!3m1!4b1!4m6!3m5!1s0x31c8bb0834205923:0x51843285312705a9!8m2!3d3.8532421!4d103.3148651!16s%2Fg%2F11bw7qc3ts?entry=ttu'
            ]
        ];

        foreach ($locations as $location => $detail) {
            EventLocation::factory()->create([
                'name' => $location,
                'address' => $detail['address'],
                'map_link' => $detail['map_link'],
            ]);
        }
    }
}
