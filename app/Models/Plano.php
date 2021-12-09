<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plano extends Model
{
    use HasFactory;

    public function tipo_pagamentos(): BelongsToMany
    {
        return $this->belongsToMany(TipoPagamento::class);
    }
}
