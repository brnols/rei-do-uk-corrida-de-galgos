<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPagamento extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tipo_pagamento(): BelongsTo
    {
        return $this->belongsTo(TipoPagamento::class);
    }

    public function pagamentos(): HasMany
    {
        return $this->hasMany(MetodoPagamento::class);
    }
}
