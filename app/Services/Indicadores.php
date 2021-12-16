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
        $this->query_ultimos_tres_com_mesma_distancia();
        $this->query_all_historico();
        return $this->race["galgos"];
    }

    public function race_info()
    {
        if( $this->tables_exist() == false ) return [];

        $race = (array) DB::table( $this->tb )->where('Horario', $this->horario)->first();
                
        $race["distancia"] = $this->regex("/\d{3}m/", $race["Race_info"]);
        $race["pick"] = $this->regex("/PICK:\s+\d/", $race["Race_info"]);
        $race["galgos"] = [];

        for ($i=1; $i <= 6; $i++)
            array_push($race["galgos"], [
                'nome' => $race[$i."_Runner"], 
                'ordem' => $i, 
                'metricas' => ['distancia' => $race["distancia"], 'pick' => $race["pick"], 'rec_final' => 0], 
                'historico' => [] 
            ]);
        
        return $race;

    }

    public function query_ultimos_tres_com_mesma_distancia()
    {
        if( $this->tables_exist() == false ) return $this;

        foreach($this->race['galgos'] as $galgo_index => $galgo){

            $ultimos = DB::table( $this->tb_tabela )->where('nome', $galgo)->where('dis', $this->race['distancia'])->orderBy("Date", "DESC")->take(3)->get()->toArray();  
            
            if( count($ultimos) ){

                $this->split($galgo_index, $ultimos)
                    ->ut($galgo_index, $ultimos)
                    ->pn($galgo_index, $ultimos)
                    ->apn($galgo_index, $ultimos)
                    ->media($galgo_index, $ultimos);
            }
        }
    }

    public function query_all_historico()
    {
        if( $this->tables_exist() == false ) return $this;

        foreach($this->race['galgos'] as $galgo_index => $galgo){
           
            $historico = DB::table( $this->tb_tabela )->where('nome', $galgo)->orderBy("Date", "DESC")->get()->toArray();  
            
            if( count($historico) ){

                $this->brt($galgo_index, $historico)
                    ->treinador($galgo_index, $historico)
                    ->idade($galgo_index, $historico)
                    ->dias_sem_correr($galgo_index, $historico)
                    ->peso($galgo_index, $historico)
                    ->sexo($galgo_index, $historico)
                    ->pedigree($galgo_index, $historico)
                    ->primeira_bend($galgo_index, $historico)
                    ->categorias($galgo_index, $historico)
                    ->historico_distancia($galgo_index, $historico)
                    ->historico_posicao($galgo_index, $historico)
                    ->historico_bends($galgo_index, $historico)
                    ->rec_cansa($galgo_index, $historico)
                    ->qtde_corridas($galgo_index, $historico)
                    ->tp($galgo_index, $historico)
                    ->historico_galgo($galgo_index, $historico)
                    ->ultima_categoria($galgo_index, $historico)
                    ->fm($galgo_index, $historico);
            }
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
    public function brt(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['brt'] = 0;

        if( isset($item['idade_treinador']) )
            $this->race['galgos'][$galgo_index]['metricas']['brt'] = $this->regex("/(BRT:\s)(\d+.?\d+)(.*)/", $item['idade_treinador'], 2);

        return $this;
    }

    /**
     * Indicador Nome do Treinador - Ultimo registro do Galgo no campo idade_treinador
     * Exemplo do Campo: "BRT: 16.66 D1 (2Dec21) Tnr: K Dodington"
     * @regex retorno exemplo : K Dodington
     */
    public function treinador(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['treinador'] = '';

        if( isset($item['idade_treinador']) )
            $this->race['galgos'][$galgo_index]['metricas']['treinador'] = $this->regex("/(Tnr:\s)(.*)/", $item['idade_treinador'], 2);

        return $this;
    }

    /**
     * Indicador Idade - Ultimo registro do Galgo no campo idade_treinador
     * Exemplo do Campo: "BRT: 16.66 D1 (2Dec21) Tnr: K Dodington"
     * @regex retorno exemplo : 2Dec21
     */
    public function idade(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['idade'] = 0;

        try {
            if( isset($item['idade_treinador']) ){
                $date = $this->regex("/(\d+\w{3}\d{2})/", $item['idade_treinador'], 0);
                $this->race['galgos'][$galgo_index]['metricas']['idade'] = Carbon::now()->diffInDays(Carbon::createFromFormat('dMy', $date));
            }
        } catch (\Throwable $th) {
            //Se der erro na conversão do carbon então deixar zerado
        }
            
        return $this;
    }
    
    /**
     * Indicador Split - Ultimo registro do Galgo no campo split
     * Exemplo do Campo: "3.33"
     */
    public function split(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['split'] = 0;

        if( isset($item['Split']) )
            $this->race['galgos'][$galgo_index]['metricas']['split'] = $item['Split'];

        return $this;
    }

    /**
     * Indicador Sexo - Ultimo registro do Galgo no campo Sexo
     * Exemplo do Campo: "Macho"
     */
    public function sexo(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['sexo'] = '';

        if( isset($item['sexo']) )
            $this->race['galgos'][$galgo_index]['metricas']['sexo'] = $item['sexo'];

        return $this;
    }

    /**
     * Indicador Pedigree/Linhagem - Ultimo registro do Galgo no campo pedigree
     * Exemplo do Campo: "Sire Superior Product Dam Sevenofnine Black bitch 24Jul19"
     */
    public function pedigree(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['pedigree'] = '';

        if( isset($item['pedigree']) )
            $this->race['galgos'][$galgo_index]['metricas']['pedigree'] = $item['pedigree'];

        return $this;
    }

    /**
     * Indicador UT - Ultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function ut(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['ut'] = 0;

        if( isset($item['CalTm']) )
            $this->race['galgos'][$galgo_index]['metricas']['ut'] = $item['CalTm'];

        return $this;
    }

    /**
     * Indicador PN - Penultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function pn(int $galgo_index, array $items)
    {
        if( count($items) < 2 ) return $this;

        $item = (array) $items[1]; // Pegar Penultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['pn'] = 0;

        if( isset($item['CalTm']) )
            $this->race['galgos'][$galgo_index]['metricas']['pn'] = $item['CalTm'];

        return $this;
    }

    /**
     * Indicador APN - Antepenultimo tempo nessa distancia pelo campo CalTm
     * Exemplo do Campo: "29.92"
     */
    public function apn(int $galgo_index, array $items)
    {
        if( count($items) < 3 ) return $this;

        $item = (array) $items[2]; // Pegar Antepenultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['apn'] = 0;

        if( isset($item['CalTm']) )
            $this->race['galgos'][$galgo_index]['metricas']['apn'] = $item['CalTm'];

        return $this;
    }


    /**
     * Indicador Dias Sem Correr - Ultima corrida versus Now pelo campo Date
     * Exemplo do Campo: "02Dec21"
     */
    public function dias_sem_correr(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['dias_sem_correr'] = 0;

        try {

            if( isset($item['Date']) )
                $this->race['galgos'][$galgo_index]['metricas']['dias_sem_correr'] = Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d', $item['Date']));

        } catch (\Throwable $th) {
            //se der erro no carbon deixar zerado
        }

        return $this;
    }

    /**
     * Indicador PESO - ultimo valor pelo campo Wght
     * Exemplo do Campo: "29.3"
     */
    public function peso(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['peso'] = 0;

        if( isset($item['Wght']) )
            $this->race['galgos'][$galgo_index]['metricas']['peso'] = $item['Wght'];

        return $this;
    }

    /**
     * Indicador 1 Bend - Ultimo valor do campo 1_Bend
     * Exemplos do Campo: "3-2-" / "3234"
     */
    public function primeira_bend(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['primeira_bend'] = 0;

        if( isset($item['1_Bend']) )
            $this->race['galgos'][$galgo_index]['metricas']['primeira_bend'] = round($item['1_Bend'],2);

        return $this;

    }

    /**
     * Indicador TP - Ultimo valor do campo Tempo_Medio
     * Exemplos do Campo: "16.89"
     */
    public function tp(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data
        
        $this->race['galgos'][$galgo_index]['metricas']['tp'] = 0;

        if( isset($item['Tempo_Medio']) )
            $this->race['galgos'][$galgo_index]['metricas']['tp'] = round($item['Tempo_Medio'],2);

        return $this;
    }

     /**
     * Indicador Rec/Cansa - Ultimo valor do campo Rec/Cansa
     * Exemplos do Campo: "3-2-" / "3234"
     */
    public function rec_cansa(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['rec_cansa'] = 0;

        if( isset($item['Rec/Cansa']) )
            $this->race['galgos'][$galgo_index]['metricas']['rec_cansa'] = round($item['Rec/Cansa'], 2);

        return $this;
    }

     /**
     * Indicador Ultima Categoria - Ultimo valor do campo Categoria como Número
     * Exemplos do Campo: "D3" Resultado "3"
     */
    public function ultima_categoria(int $galgo_index, array $items)
    {
        $item = (array) $items[0]; // Pegar ultimo pois a query está ordenada pela data

        $this->race['galgos'][$galgo_index]['metricas']['ultima_categoria'] = 0;

        if( isset($item['Grade']) )
            $this->race['galgos'][$galgo_index]['metricas']['ultima_categoria'] = round($this->regex("/\d+/", $item['Grade']), $index = 2, $default = 0);

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

        for ($i=0; $i < 3 ; $i++) { 
            if( isset($items[$i]) ){
                if( array_key_exists('CalTm', (array)$items[$i]) ){
                    if( $items[$i]->CalTm != null ){
                        $soma += $items[$i]->CalTm;
                        $count++;
                    }
                }
            }
        }

        if($count > 0)
            $this->race['galgos'][$galgo_index]['metricas']['media'] = round($soma/$count,2);
        
        return $this;
    }

    /**
     * Indicador Final Média - Média Chegada Final pelo campo Fin
     * Exemplo do Campo: "1st"
     */
    public function fm(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['fm'] = 0;
        $soma = 0;
        $count = 0;

        for ($i=0; $i < count($items) ; $i++) {             
            if( array_key_exists('Fin', (array)$items[$i]) ){
                if( $items[$i]->Fin != null ){
                    $soma += round($this->regex("/\d+/", $items[$i]->Fin, $index = 0, $default = 0),2);
                    $count++;
                }
            }
        }

        if($count > 0)
            $this->race['galgos'][$galgo_index]['metricas']['fm'] = round($soma/$count,2);
        
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
        
        for ($i=0; $i < 5 ; $i++) { 
            if( isset($items[$i]) ){
                if( array_key_exists('Grade', (array)$items[$i]) ){
                    if( $items[$i]->Grade != null ){
                        array_push($categorias, $items[$i]->Grade);
                    }
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

        for ($i=0; $i < 5 ; $i++) { 
            if( isset($items[$i]) ){
                if( array_key_exists('Fin', (array)$items[$i]) ){
                    if( $items[$i]->Fin != null ){
                        array_push($historico_posicao, $items[$i]->Fin);
                    }
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

        for ($i=0; $i < 5 ; $i++) { 
            if( isset($items[$i]) ){
                if( array_key_exists('Dis', (array)$items[$i]) ){
                    if( $items[$i]->Dis != null ){
                        array_push($historico_distancia, $items[$i]->Dis);
                    }
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
            if( isset($items[$i]) ){
                if( array_key_exists('Bends', (array)$items[$i]) ){
                    if( $items[$i]->Bends != null ){
                        array_push($historico_bends, substr($items[$i]->Bends, 0, 1));
                    }
                }
            }
        }

        if(count($historico_bends))
            $this->race['galgos'][$galgo_index]['metricas']['historico_bends'] = implode("-", $historico_bends);

        return $this;
    }

    /**
     * Indicador Qtde de Corridas - Count de Corridas no Banco
     */
    public function qtde_corridas(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['metricas']['qtde_corridas'] = count($items);
        return $this;
    }

    /**
     * Historico Galgo - Ultimas 5 Concatenadas do campo grade
     * Exemplos do Campo: "D1"
     */
    public function historico_galgo(int $galgo_index, array $items)
    {
        $this->race['galgos'][$galgo_index]['historico'] = [];
        
        $maps = [
            ['key' => 'trap',       'column' => 'Trp', 'regex'=> ['pattern' => "/\d+/", 'index' => 0] ],
            ['key' => 'grade',      'column' => 'Grade', 'regex'=> null ],
            ['key' => 'data',       'column' => 'Date', 'regex'=> null ],
            ['key' => 'cp',         'column' => 'Gng', 'regex'=> null ],
            ['key' => 'pista',      'column' => 'Track', 'regex'=> null ],
            ['key' => 'distancia',  'column' => 'Dis', 'regex'=> null ],
            ['key' => 'peso',       'column' => 'Wght', 'regex'=> null ],
            ['key' => 'split',      'column' => 'Split', 'regex'=> null ],
            ['key' => 'bends',      'column' => 'Bends', 'regex'=> null ],
            ['key' => 'tempo',      'column' => 'WnTm', 'regex'=> null ],
            ['key' => 'tempo_real', 'column' => 'WnTm', 'regex'=> null ],
            ['key' => 'vitoria',    'column' => 'Fin',  'regex'=> ['pattern' => "/\d+/", 'index' => 0], 'fn' => function($value){  return $value == "1"; }],
        ];
                
        for ($i=0; $i < 10 ; $i++) { 

            if( isset($items[$i]) ){

                $item = (array)$items[$i];
                $row = [];

                foreach($maps as $map){

                    $row[$map['key']] = null;

                    if( isset($item[$map['column']]) ) {
                        $row[$map['key']] = isset($map['regex']) ? $this->regex($map['regex']['pattern'], $item[$map['column']],$map['regex']['index'])  : $item[$map['column']];
                    }else{
                        $row[$map['key']] = null;
                    }

                    if( isset($map['fn']) )
                        $row[$map['key']] = $map['fn']($row[$map['key']]);
                }

                array_push($this->race['galgos'][$galgo_index]['historico'], $row );
            }
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

    private function regex($pattern, $value, $index = 0, $default = '')
    {
        preg_match_all($pattern, $value, $matches);
        return ( count($matches[$index]) ) ? $matches[$index][0] : $default;
    }
}