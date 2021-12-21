<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Plano;
use App\Models\Contrato;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'user_id' => User::where("email", "dev@dev.com")->first()->id,
            'plano_id' => Plano::firstOrFail()->id,
            'data_ativacao' => now(),
            'data_cancelamento' => null,
            'data_expiracao' => now(),
            'ativo' => true,
        ]);
    }
}
