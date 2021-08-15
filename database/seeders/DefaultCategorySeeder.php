<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate(
            [
                'name' => 'Uncategorised',
                'slug' => Str::slug('Uncategorised'),
            ]
        );
    }
}
