<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'type' => 'Carro'
        ]);

        Category::create([
            'type' => 'Moto'
        ]);

        Category::create([
            'type' => 'Caminhão'
        ]);
    }
}
