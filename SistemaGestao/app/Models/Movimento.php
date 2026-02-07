<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimento extends Model
{
    protected $fillable = [
        'encomenda_id', 
        'produto_id', 
        'user_id', 
        'codigo', 
        'quantidade', 
        'movimento', 
        'objecto', 
        'descricao'
        ]

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
