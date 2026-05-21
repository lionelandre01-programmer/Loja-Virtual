<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Categoria
 *
 * Representa uma categoria de produtos (ex: 'camisa', 'joia').
 *
 * Atributos principais:
 * - id (int)
 * - name (string)
 *
 * Relações:
 * - produto(): tem muitos `Produto`
 */
class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['name'];

    public function produto(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}