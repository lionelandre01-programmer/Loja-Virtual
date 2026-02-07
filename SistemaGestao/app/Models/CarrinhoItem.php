<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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