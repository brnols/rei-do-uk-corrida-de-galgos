<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\Indicadores;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndicadoresTest extends TestCase
{

    public function test_table_not_exist()
    {
        $service = new Indicadores("TableNotExit", '10:46');
        $retorno = $service->all();
        $this->assertTrue(is_array($retorno));
        $this->assertTrue(count($retorno) == 0);
    }

    public function test_table_harlow()
    {
        $service = new Indicadores("harlow", '10:46');
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

    public function test_table_nottingham()
    {
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

}
