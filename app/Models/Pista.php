<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Pista extends Model
{
    use HasFactory;

    static function validatePista(string $pista): bool
    {
        /* Pista existe? */
        Pista::where('tabela', $pista)
            ->firstOrFail();

        /* Tabela existe? */
        if (!Schema::hasTable($pista)) {
            abort(404);
        }

        return true;
    }
}
