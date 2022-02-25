<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(AutomobileSeeder::class);
        $this->call(TipsSeeder::class);
        $this->call(AutomobileCategorySeeder::class);
        $this->call(AutomobileTipsSeeder::class);
    }
}