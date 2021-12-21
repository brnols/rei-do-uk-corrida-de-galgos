<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Filtro;
use App\Services\Indicadores;
use Illuminate\Support\Facades\Auth;

class IndicadoresTest extends TestCase
{

    public function test_table_not_exist()
    {
        $this->set_auth_user();

        $service = new Indicadores("TableNotExit", '10:46');
        $retorno = $service->all();
        $this->assertTrue(is_array($retorno));
        $this->assertTrue(count($retorno) == 0);
    }

    public function test_table_harlow()
    {
        $this->set_auth_user();

        $service = new Indicadores("harlow", '10:46');
        $retorno = $service->all();
        //dd($retorno);
        $this->assertTrue(count($retorno) == 6);
        
        for ($i=0; $i < 5 ; $i++) { 
            $this->assertTrue(array_key_exists( "nome", $retorno[$i]));
            $this->assertTrue(array_key_exists( "ordem", $retorno[$i]));
            $this->assertTrue(array_key_exists( "metricas", $retorno[$i]));
            $this->assertTrue(array_key_exists( "brt", $retorno[$i]["metricas"]));
            $this->assertTrue(array_key_exists( "rec_cansa", $retorno[$i]["metricas"]));
            $this->assertTrue(array_key_exists( "historico_posicao", $retorno[$i]["metricas"]));
        }
    }

    public function test_table_harlow_com_filtros()
    {
        
        $this->set_auth_user();

        Filtro::create([
            'user_id' => User::where('email', 'dev@dev.com')->first()->id,
            'coluna' => 'idade',
            'operador' => '=',
            'valor' => 69
        ]);
        
        $service = new Indicadores("harlow", '10:46');
        $retorno = $service->all();
        $this->assertTrue(count($retorno) == 1);
            
    }

    public function test_table_nottingham()
    {
        $this->set_auth_user();

        $service = new Indicadores("nottingham", '11:06');
        $retorno = $service->all();
        $this->assertTrue(count($retorno) == 6);
        
        for ($i=0; $i < 5 ; $i++) { 
            $this->assertTrue(array_key_exists( "nome", $retorno[$i]));
            $this->assertTrue(array_key_exists( "ordem", $retorno[$i]));
            $this->assertTrue(array_key_exists( "metricas", $retorno[$i]));
            $this->assertTrue(array_key_exists( "brt", $retorno[$i]["metricas"]));
            $this->assertTrue(array_key_exists( "rec_cansa", $retorno[$i]["metricas"]));
            $this->assertTrue(array_key_exists( "historico_posicao", $retorno[$i]["metricas"]));
        }
    }

    private function set_auth_user()
    {
        $user = User::where('email', 'dev@dev.com')->first();
        
        Auth::loginUsingId($user->id);
        
        Filtro::where('user_id', $user->id)->delete();
    }

}
