<?php

namespace Database\Seeders;

use App\Models\Pista;
use Illuminate\Database\Seeder;

class PistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pistas = [
            'CentralPark',
            'Henlow',
            'Monmore',
            'Romford',
            'Doncaster',
            'Towcester',
            'Youghal',
            'PerryBarr',
            'Swindon',
            'Sheffield',
            'Yarmouth',
            'Nottingham',
            'Monmore',
            'Hove',
            'Crayford',
            'Tralee',
            'Kinsley',
            'Sunderland',
            'Newcastle',
            'Kilkenny',
            'Harlow',
            'Youghal',
            'Waterford',
            'Limerick',
            'Mullingar',
        ];

        foreach($pistas as $pista)
            Pista::create(["nome" => $pista, "tabela" => $pista ]);
    }
}
