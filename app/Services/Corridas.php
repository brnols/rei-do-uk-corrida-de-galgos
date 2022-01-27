<?php

namespace App\Services;

use App\Models\Pista;
use Illuminate\Support\Facades\Schema;

class Corridas 
{

    /**
     * @return [ 'tabela_name', 'tabela_name', 'tabela_name']
     */
    public function lista_table()
    {
        return Pista::all()
                    ->reject(function($pista){ 
                        return !$this->table_exist($pista->tabela); 
                    })
                    ->map(function ($model, $key) {
                        return $model->tabela;
                    });
    }

    public function table_exist($table)
    {
        return Schema::hasTable($table)
            && Schema::hasTable("{$table}_tabela");
    }

}