<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
        'school_name' => 'SMK Informatika Komputer Ampana Kota',
        'latitude' => '-0.8667', // Contoh koordinat Ampana
        'longitude' => '121.5833',
        'radius' => 50, // 50 Meter
        'time_in' => '07:15:00',
        'time_out' => '15:00:00',
    ]);
    }
}
