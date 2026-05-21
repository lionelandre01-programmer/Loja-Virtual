<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Carrinho
 *
 * Representa um carrinho de compras associado a um `usuario_id` ou `session_id`.
 *
 * Atributos principais:
 * - id (int)
 * - usuario_id (int|null)
 * - session_id (string|null)
 *
 * Relações:
 * - items(): tem muitos `CarrinhoItem`
 */
class Carrinho extends Model
{
    protected $fillable = ['usuario_id','session_id'];

    public function items(): HasMany
    {
        return $this->hasMany(CarrinhoItem::class);
    }
}
