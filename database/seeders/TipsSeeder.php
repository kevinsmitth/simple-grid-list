<?php

namespace Database\Seeders;

use App\Models\Tips;
use Illuminate\Database\Seeder;

class TipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tips::create([
            'text' => 'Troque o pneu mesmo se ainda não estiver careca.'
        ]);

        Tips::create([
            'text' => 'Pastilhas de freio novas podem salvar a sua vida.'
        ]);

        Tips::create([
            'text' => 'Se você tem esse modelo de veículo, vale muito a pena trocar o óleo de x em x anos.'
        ]);
    }
}
