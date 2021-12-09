<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fatura extends Model
{
    use HasFactory;

    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }
}
