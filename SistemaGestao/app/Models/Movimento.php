<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Movimento
 *
 * Registo de ações / movimentos realizados no sistema (logs funcionais).
 *
 * Atributos principais:
 * - id (int)
 * - encomenda_id (int|null)
 * - produto_id (int|null)
 * - user_id (int|null)
 * - codigo (string|null) — código ou id do objecto afetado
 * - quantidade (int|null)
 * - movimento (string) — descrição curta do tipo de movimento
 * - objecto (string|null) — nome do objecto afetado
 * - descricao (string|null)
 *
 * Relações:
 * - user(): pertence a `User`
 */
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
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
