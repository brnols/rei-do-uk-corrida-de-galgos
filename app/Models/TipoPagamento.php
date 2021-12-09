<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TipoPagamento extends Model
{
    use HasFactory;

    public function planos(): BelongsToMany
    {
        return $this->belongsToMany(Plano::class);
    }
}
