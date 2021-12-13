<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class Indicadores
{
    protected $tb;
    protected $tb_tabela;    
    protected $tb_results;    
    protected $horario; 
    protected $race;
    protected $metricas;

    public function __construct($tabela, $horario)
    {
        $this->tb           = $tabela;
        $this->tb_tabela    = $tabela . "_tabela";
        $this->tb_results   = $tabela . "_results";

        $this->horario = $horario;
        $this->race = $this->race_info();
    }

    public function all()
    {
        if( $this->tables_exist() == false ) return [];
        $this->query_ultimos();
        $this->query_ultimos_tres_com_mesma_distancia();
        $this->query_ultimos_dez();
        return $this->race["galgos"];
    }

    public function race_info()
    {
        if( $this->tables_exist() == false ) return [];

        $race = (array) DB::table( $this->tb )->where('Horario', $this->horario)->first();
                
        $race["distancia"] = $this->regex("/\d{3}m/", $race["Race_info"]);
        $race["galgos"] = [];

        for ($i=1; $i <= 6; $i++)
            array_push($race["galgos"], ['nome' => $race[$i."_Runner"], 'ordem' => $i, 'metricas' => []] );
        
        return $race;

    }

    public function query_ultimos()
    {
        if( $this->tables_exist() == false ) return $this;

        foreach($this->race['galgos'] as $galgo_index => $galgo){
            $item = (array) DB::table( $this->tb_tabela )->where('nome', $galgo['nome'])->first();  
            $this->brt($galgo_index, $item)
                ->dias_sem_correr($galgo_index, $item)
                ->peso($galgo_index, $item);
        }
    }

    public function query_ultimos_tres_com_mesma_distancia()
    {
        if( $this->tables_exist() == false ) return $this;

        foreach($this->race['galgos'] as $galgo_index => $galgo){
            $ultimos = DB::table( $this->tb_tabela )->where('nome', $galgo)->where('dis', $this->race['distancia'])->take(3)->get()->toArray();  
            $this->split($galgo_index, (array) $ultimos[0])
                ->ut($galgo_index, (array) $ultimos[0])
                ->pn($galgo_index, (array) $ultimos[1]) // Penultimo
                ->apn($galgo_index, (array) $ultimos[2]) // Antepenultimo
                ->media($galgo_index, $ultimos);
        }
    }

    public function query_ultimos_dez()
    {
        if( $this->tables_exist() == false ) return $this;

        foreach($this->race['galgos'] as $galgo_index => $galgo){
            $ultimos = DB::table( $this->tb_tabela )->where('nome', $galgo)->take(10)->get()->toArray();  
            $this->primeira_bend($galgo_index, $ultimos)
                ->categorias($galgo_index, $ultimos)
                ->historico_distancia($galgo_index, $ultimos)
                ->historico_posicao($galgo_index, $ultimos)
                ->historico_bends($galgo_index, $ultimos)
                ->red_cansa($galgo_index, $ultimos);
        }
    }
    
    /**
     * -----------------------------------
     *          INDICADORES
     * -----------------------------------
     */

    /**
     * Indicador BRT - Ultimo registro do Galgo no campo idade_treinador
     * Exemplo do Campo: "BRT: 16.66 D1 (2Dec21) Tnr: K Dodington"
     * @regex retorno exemplo : 16.66
     */
    public function brt(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['brt'] = 0;

        if( array_key_exists('idade_treinador', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['brt'] = $this->regex("/(BRT:\s)(\d+.?\d+)(.*)/", $item['idade_treinador'], 2);

        return $this;
    }

    /**
     * Indicador Split - Ultimo registro do Galgo no campo split
     * Exemplo do Campo: "3.33"
     */
    public function split(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['split'] = 0;

        if( array_key_exists('Split', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['split'] = $item['Split'];

        return $this;
    }

    /**
     * Indicador UT - Ultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function ut(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['ut'] = 0;

        if( array_key_exists('CalTm', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['ut'] = $item['CalTm'];

        return $this;
    }

    /**
     * Indicador PN - Penultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function pn(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['pn'] = 0;

        if( array_key_exists('CalTm', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['pn'] = $item['CalTm'];

        return $this;
    }

    /**
     * Indicador APN - Antepenultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function apn(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['apn'] = 0;

        if( array_key_exists('CalTm', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['apn'] = $item['CalTm'];

        return $this;
    }

    /**
     * Indicador Média - Média tempo dos ultimos nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function media(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['media'] = 0;
        $soma = 0;
        $count = 0;

        foreach($items as $itemStdClass){
            if( array_key_exists('CalTm', (array)$itemStdClass) ){
                if( $itemStdClass->CalTm != null ){
                    $soma += $itemStdClass->CalTm;
                    $count++;
                }
            }
        }

        if($count > 0)
            $this->race['galgos'][$galgo_index]['metricas']['media'] = $soma/$count;
        
        return $this;
    }

    /**
     * Indicador Dias Sem Correr - Ultima corrida versus Now pelo campo Date
     * Exemplo do Campo: "02Dec21"
     */
    public function dias_sem_correr(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['dias_sem_correr'] = 0;

        try {

            if( array_key_exists('Date', $item) )
                $this->race['galgos'][$galgo_index]['metricas']['dias_sem_correr'] = Carbon::now()->diffInDays(Carbon::createFromFormat('dMy', $item['Date']));

        } catch (\Throwable $th) {
            //se der erro no carbon deixar zerado
        }

        return $this;
    }

    /**
     * Indicador PESO - ultimo valor pelo campo Wght
     * Exemplo do Campo: "29.3"
     */
    public function peso(int $galgo_index, array $item)
    {
        $this->race['galgos'][$galgo_index]['metricas']['peso'] = 0;

        if( array_key_exists('Wght', $item) )
            $this->race['galgos'][$galgo_index]['metricas']['peso'] = $item['Wght'];

        return $this;
    }

    /**
     * Indicador 1 Bend - Média do primeiro valor no campo Bends
     * Exemplos do Campo: "3-2-" / "3234"
     */
    public function primeira_bend(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['primeira_bend'] = 0;
        $soma = 0;
        $count = 0;

        try {

            foreach($items as $itemStdClass){
                if( array_key_exists('Bends', (array)$itemStdClass) ){
                    if( $itemStdClass->CalTm != null ){
                        $soma += intval( substr($itemStdClass->Bends, 0, 1) );
                        $count++;
                    }
                }
            }

            if($count > 0)
                $this->race['galgos'][$galgo_index]['metricas']['primeira_bend'] = $soma/$count;

        } catch (\Throwable $th) {
            throw $th;
            //se der erro na conversão para int deixar zerado
        }

        return $this;
    }

    /**
     * Indicador TP - Tempo Médio do campo CalTm
     * Exemplos do Campo: "16.89"
     */
    public function tp(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['tp'] = 0;
        $soma = 0;
        $count = 0;

        try {

            foreach($items as $itemStdClass){
                if( array_key_exists('CalTm', (array)$itemStdClass) ){
                    if( $itemStdClass->CalTm != null ){
                        $soma += $itemStdClass->CalTm;
                        $count++;
                    }
                }
            }

            if($count > 0)
                $this->race['galgos'][$galgo_index]['metricas']['tp'] = $soma/$count;

        } catch (\Throwable $th) {
            throw $th;
            //se der erro na conversão para int deixar zerado
        }

        return $this;
    }

    /**
     * Indicador Categorias - Ultimas 5 Concatenadas do campo grade
     * Exemplos do Campo: "D1"
     */
    public function categorias(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['categorias'] = '';
        $categorias = [];
        //dd($items);
        for ($i=0; $i < 5 ; $i++) { 
            if( array_key_exists('Grade', (array)$items[$i]) ){
                if( $items[$i]->Grade != null ){
                    array_push($categorias, $items[$i]->Grade);
                }
            }
        }

        if(count($categorias))
            $this->race['galgos'][$galgo_index]['metricas']['categorias'] = implode("-", $categorias);


        return $this;
    }

    /**
     * Indicador Historico Posição - Ultimas 5 Concatenadas do campo Fin
     * Exemplos do Campo: "3rd"
     */
    public function historico_posicao(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['historico_posicao'] = '';
        $historico_posicao = [];
        //dd($items);
        for ($i=0; $i < 5 ; $i++) { 
            if( array_key_exists('Fin', (array)$items[$i]) ){
                if( $items[$i]->Fin != null ){
                    array_push($historico_posicao, $items[$i]->Fin);
                }
            }
        }

        if(count($historico_posicao))
            $this->race['galgos'][$galgo_index]['metricas']['historico_posicao'] = implode("-", $historico_posicao);


        return $this;
    }

    /**
     * Indicador Historico Distancia - Ultimas 5 Concatenadas do campo Dis
     * Exemplos do Campo: "265m"
     */
    public function historico_distancia(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['historico_distancia'] = '';
        $historico_distancia = [];
        //dd($items);
        for ($i=0; $i < 5 ; $i++) { 
            if( array_key_exists('Dis', (array)$items[$i]) ){
                if( $items[$i]->Dis != null ){
                    array_push($historico_distancia, $items[$i]->Dis);
                }
            }
        }

        if(count($historico_distancia))
            $this->race['galgos'][$galgo_index]['metricas']['historico_distancia'] = implode("-", $historico_distancia);

        return $this;
    }

    /**
     * Indicador Historico Bends - Ultimas 5 Concatenadas do primeiro caracter do campo Bends
     * Exemplos do Campo: "3-2-" / "3234"
     */
    public function historico_bends(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['historico_bends'] = '';
        $historico_bends = [];
        
        for ($i=0; $i < 5 ; $i++) { 
            if( array_key_exists('Bends', (array)$items[$i]) ){
                if( $items[$i]->Bends != null ){
                    array_push($historico_bends, substr($items[$i]->Bends, 0, 1));
                }
            }
        }

        if(count($historico_bends))
            $this->race['galgos'][$galgo_index]['metricas']['historico_bends'] = implode("-", $historico_bends);

        return $this;
    }

    /**
     * Indicador Red/Cansa - Calculo do campo Bends
     * Exemplos do Campo: "3-2-" / "3234"
     */
    public function red_cansa(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['red_cansa'] = 0;
        $soma = 0;
        $count = 0;

        try {
            
            foreach($items as $itemStdClass){
                if( array_key_exists('Bends', (array)$itemStdClass) ){
                    if( $itemStdClass->Bends != null ){
                        $first = intval(substr($itemStdClass->Bends, 0, 1));
                        $last = intval(substr($itemStdClass->Bends, -1, 1));
                        if( $first > 0 && $last > 0 ){
                            $soma += ($first - $last);
                            $count++;
                        }
                    }
                }
            }
            
            if($count > 0)
                $this->race['galgos'][$galgo_index]['metricas']['red_cansa'] = $soma/$count;

        } catch (\Throwable $th) {
            //se der erro na conversão para int deixar zerado
        }

        return $this;
    }

    /**
     * Funções de Suporte
     */
    private function tables_exist()
    {
        return Schema::hasTable($this->tb) 
            && Schema::hasTable($this->tb_results)
            && Schema::hasTable($this->tb_tabela);
    }

    private function regex($pattern, $value, $index = 0)
    {
        preg_match_all($pattern, $value, $matches);
        return ( count($matches[$index]) ) ? $matches[$index][0] : '';
    }
}