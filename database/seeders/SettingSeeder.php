<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'app_name', 'value' => 'ETGA']);
        Setting::create(['key' => 'default_currency', 'value' => 'USD']);
        // Add more settings as needed
    }
}
