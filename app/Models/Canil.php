<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pista;
use App\Services\Corridas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Canil extends Model
{
    use HasFactory;

    protected $fillable = [
        'galgo',
        'nome',
        'observacao',
        'pista',
        'tabela'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function proxima_corrida()
    {
        $service = new Corridas; 
        $corridas = collect([]);

        foreach( $service->lista_table() as $pista){
                $corridas = $corridas->merge( 
                    DB::table($pista)->where("1_Runner", $this->galgo)
                                    ->orWhere("2_Runner", $this->galgo)
                                    ->orWhere("3_Runner", $this->galgo)
                                    ->orWhere("4_Runner", $this->galgo)
                                    ->orWhere("5_Runner", $this->galgo)
                                    ->orWhere("6_Runner", $this->galgo)
                                    ->take(1)
                                    ->get()
                                    ->map(function($model, $key) use($pista){
                                        $model->tabela = $pista;
                                        $model->pista = Pista::whereTabela($pista)->first()->nome;
                                        $model->hora_br = Carbon::createFromFormat('H:i:s', $model->Horario)->subHour(3)->format('H:i');
                                        $model->hora_uk = Carbon::createFromFormat('H:i:s', $model->Horario)->format('H:i');
                                        return $model; 
                                    }) 
                );

                if( $corridas->count() ) break; // sair ao encontrar a primeira
        }
        
        return $corridas->first(); // usando o first pois é uma collection
    }
    
}
