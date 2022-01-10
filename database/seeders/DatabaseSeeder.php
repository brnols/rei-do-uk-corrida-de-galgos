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
        \App\Models\User::create([
            'email'    => 'dev@dev.com',
            'name'     => 'dev',
            'password' => bcrypt('dev'),
            'telefone' => "21212121"
        ]);
        
        // Ordem aqui importa
        $this->call([
            PistaSeeder::class,
            PlanoSeeder::class,
            ContratoSeeder::class,
        ]);
    }
}
