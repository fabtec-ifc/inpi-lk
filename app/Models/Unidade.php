<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sigla', 'tipo', 'unidade_pai_id'];

    // Relação com a unidade “pai”
    public function unidadePai()
    {
        return $this->belongsTo(Unidade::class, 'unidade_pai_id')->without('unidadePai');
    }

    public function unidadesFilhas()
    {
        return $this->hasMany(Unidade::class, 'unidade_pai_id')->without('unidadesFilhas');
    }

}

