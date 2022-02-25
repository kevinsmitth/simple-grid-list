<?php

namespace Database\Seeders;

use App\Models\AutomobileTips;
use Illuminate\Database\Seeder;

class AutomobileTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AutomobileTips::create([
            'automobile_id' => 1,
            'tips_id' => 1
        ]);

        AutomobileTips::create([
            'automobile_id' => 2,
            'tips_id' => 2
        ]);

        AutomobileTips::create([
            'automobile_id' => 3,
            'tips_id' => 3
        ]);
    }
}
