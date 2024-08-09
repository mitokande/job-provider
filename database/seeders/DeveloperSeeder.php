<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Developer::create([
            'hourly_rate' => 1
        ]);
        Developer::create([
            'hourly_rate' => 2
        ]);
        Developer::create([
            'hourly_rate' => 3
        ]);
        Developer::create([
            'hourly_rate' => 4
        ]);
        Developer::create([
            'hourly_rate' => 5
        ]);
    }
}
