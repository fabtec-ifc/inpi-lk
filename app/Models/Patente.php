<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
    public function unidade() {
        return $this->belongsTo(Unidade::class);
    }
    public function scopePorUsuario($query, $user)
    {
        if ($user->role === 'reitor') return $query; // Reitor vê tudo
        return $query->where('unidade_id', $user->unidade_id);
    }

}
