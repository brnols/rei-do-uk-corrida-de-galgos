<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Canil extends Model
{
    use HasFactory;

    protected $fillable = [
        'galgo',
        'observacao',
        'pista',
        'tabela'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
