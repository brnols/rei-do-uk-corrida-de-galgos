<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::create([
            'nome' => "Padrão",
            'valor' => 0,
            'dias' => 0,
            'vip' => 1,
            'max_parcelamento' => 0
        ]);
    }
}
