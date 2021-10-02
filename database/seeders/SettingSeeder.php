<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'name' => 'Laravel',
            'tagline' => '',
        ];

        foreach ($settings as $name => $value) {
            Setting::create([
                'name' => $name,
                'value' => $value,
            ]);
        }
    }
}
