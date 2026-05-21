<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EncomendaItem
 *
 * Item dentro de uma `Encomenda`, referenciando um `Produto`.
 *
 * Atributos principais:
 * - id (int)
 * - encomenda_id (int)
 * - produto_id (int)
 * - quantidade (int)
 * - preco (decimal)
 *
 * Relações:
 * - encomenda(): pertence a `Encomenda`
 * - produto(): pertence a `Produto`
 */
class EncomendaItem extends Model
{
    protected $fillable = ['encomenda_id', 'produto_id', 'quantidade', 'preco'];

    public function encomenda(): BelongsTo
    {
        return $this->belongsTo(Encomenda::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}