<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Provider;
use Artisan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
           ProviderSeeder::class,
           DeveloperSeeder::class
        ]);
        Artisan::call('provide:tasks');
    }
}
