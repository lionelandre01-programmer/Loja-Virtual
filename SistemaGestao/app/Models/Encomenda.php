<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encomenda extends Model
{
    protected $fillable = ['user_id', 'estado', 'total']

    public function items(): HasMany
    {
        return $this->hasMany(EncomendaItems::class);
    }
}
