<?php

namespace Database\Seeders;

use App\Models\Automobile;
use Illuminate\Database\Seeder;

class AutomobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Automobile::create([
            'mark' => 'Fiat',
            'model' => 'Punto',
            'version' => '2.0'
        ]);

        Automobile::create([
            'mark' => 'Volkswagen',
            'model' => 'Gol',
            'version' => '3'
        ]);

        Automobile::create([
            'mark' => 'Honda',
            'model' => 'Civic',
            'version' => ''
        ]);
    }
}
