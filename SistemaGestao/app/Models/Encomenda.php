<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Encomenda
 *
 * Representa uma encomenda/pedido feito por um utilizador.
 *
 * Atributos principais:
 * - id (int)
 * - user_id (int)
 * - estado (string) — exemplo: 'pendente','paga','enviada','reembolsado'
 * - total (decimal)
 * - endereco (string)
 *
 * Relações:
 * - items(): tem muitos `EncomendaItem`
 * - user(): pertence a `User`
 */
class Encomenda extends Model
{
    protected $fillable = ['user_id', 'estado', 'total','endereco'];

    public function items(): HasMany
    {
        return $this->hasMany(EncomendaItems::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
