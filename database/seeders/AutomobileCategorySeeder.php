<?php

namespace Database\Seeders;

use App\Models\AutomobileCategory;
use Illuminate\Database\Seeder;

class AutomobileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AutomobileCategory::create([
            'automobile_id' => 1,
            'category_id' => 1
        ]);
        AutomobileCategory::create([
            'automobile_id' => 2,
            'category_id' => 2
        ]);
        AutomobileCategory::create([
            'automobile_id' => 3,
            'category_id' => 3
        ]);
    }
}
