<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    public function run()
    {
        Developer::factory()->createMany([
            [
                'name' => 'DEV1',
                'level' => 1,
                'capacity' => 45
            ],
            [
                'name' => 'DEV2',
                'level' => 2,
                'capacity' => 45
            ],
            [
                'name' => 'DEV3',
                'level' => 3,
                'capacity' => 45
            ],
            [
                'name' => 'DEV4',
                'level' => 4,
                'capacity' => 45
            ],
            [
                'name' => 'DEV5',
                'level' => 5,
                'capacity' => 45
            ]
        ]);
    }
}
