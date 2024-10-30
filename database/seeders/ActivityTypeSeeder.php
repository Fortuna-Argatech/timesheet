<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Perjalanan',
                'rate' => 5000,
            ],
            [
                'name' => 'Execution',
                'rate' => 9000,
            ],
            [
                'name' => 'Installation',
                'rate' => 10000,
            ],
            [
                'name' => 'Karantina',
                'rate' => 5000,
            ],
            [
                'name' => 'Lembur Hari Kerja',
                'rate' => 30000,
            ],
            [
                'name' => 'Lembur Hari Libur',
                'rate' => 31250,
            ],
            [
                'name' => 'Closing Project',
                'rate' => 20000,
            ],
            [
                'name' => 'Pilot Project',
                'rate' => 12000,
            ],
            [
                'name' => 'Survey',
                'rate' => 7000,
            ],
            [
                'name' => 'Standby',
                'rate' => 4000,
            ],
            [
                'name' => 'Presentation',
                'rate' => 75000,
            ],
            [
                'name' => 'Uji Kinerja',
                'rate' => 20000,
            ],
            [
                'name' => 'Online Presentation',
                'rate' => 50000,
            ],
            [
                'name' => 'Driver',
                'rate' => 20000,
            ],
            [
                'name' => 'Troubleshooting',
                'rate' => 50000,
            ],
            [
                'name' => 'Improvement',
                'rate' => 20000,
            ],
            [
                'name' => 'SO',
                'rate' => 200000,
            ],
            [
                'name' => 'UID',
                'rate' => 1000000,
            ],
            [
                'name' => 'ID Pendaftaran',
                'rate' => 1000000,
            ],
            [
                'name' => 'Kalibrasi',
                'rate' => 15000,
            ],
            [
                'name' => 'Kalibrasi Sparing',
                'rate' => 15000,
            ],
        ];

        foreach ($data as $activityType) {
            ActivityType::updateOrCreate(
                ['name' => $activityType['name']],
                ['rate' => $activityType['rate']]
            );
        }
    }
}
