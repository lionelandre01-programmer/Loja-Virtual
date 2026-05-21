<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Produto
 *
 * Representa um produto vendido na loja virtual.
 *
 * Atributos principais (colunas na tabela `produtos`):
 * - id (int)
 * - name (string)
 * - price (float)
 * - quantity (int)
 * - description (string|null)
 * - genero (string|null) — exemplo: 'masculino'|'feminino'
 * - category (int) — chave estrangeira para `categorias` (Categoria::class)
 * - image (string|null) — nome do ficheiro em `public/imagens/img_product`
 *
 * Relações:
 * - categoria(): pertence a `Categoria`
 */
class Produto extends Model
{
    protected $fillable = ['name','price','quantity','description','genero','category','image'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'category', 'id');
    }
}
