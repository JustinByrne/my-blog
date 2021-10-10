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
            'site_name' => 'Laravel',
            'tag_line' => null,
            'site_logo' => null,
            'facebook_url' => null,
            'instagram_url' => null,
            'twitter_url' => null,
            'github_url' => null,
        ];

        foreach ($settings as $name => $value) {
            if (! Setting::where('name', $name)->exists()) {
                Setting::create([
                    'name' => $name,
                    'value' => $value,
                ]);
            }
        }
    }
}
