<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encomenda extends Model
{
    protected $fillable = ['encomenda_id', 'produto_id', 'quantidade', 'preco']

    public function encomenda(): BelongsTo
    {
        return $this->belongsTo(Encomenda::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}