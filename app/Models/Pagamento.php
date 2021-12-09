<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    use HasFactory;

    public function fatura(): BelongsTo
    {
        return $this->belongsTo(Fatura::class);
    }

    public function metodo_pagamento(): BelongsTo
    {
        return $this->belongsTo(MetodoPagamento::class);
    }
}
