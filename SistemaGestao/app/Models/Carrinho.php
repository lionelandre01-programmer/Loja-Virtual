<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrinho extends Model
{
    protected $fillable = ['usuario_id','session_id'];

    public function items(): HasMany
    {
        return $this->hasMany(CarrinhoItem::class);
    }
}
