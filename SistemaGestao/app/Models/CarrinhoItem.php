<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CarrinhoItem
 *
 * Item do carrinho, liga um `Carrinho` a um `Produto`.
 *
 * Atributos principais:
 * - id (int)
 * - carrinho_id (int)
 * - produto_id (int)
 * - quantidade (int)
 * - preco (decimal)
 *
 * Relações:
 * - carrinho(): pertence a `Carrinho`
 * - produto(): pertence a `Produto`
 */
class CarrinhoItem extends Model
{
    protected $table = 'carrinhoItems';

    protected $fillable = ['carrinho_id','produto_id','quantidade','preco'];

    public function carrinho(): BelongsTo
    {
        return $this->belongsTo(Carrinho::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}