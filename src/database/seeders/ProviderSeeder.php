<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        Provider::create(['name' => 'TR']);
        Provider::create(['name' => 'USA']);
    }
}
