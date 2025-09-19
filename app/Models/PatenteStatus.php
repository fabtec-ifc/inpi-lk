<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatenteStatus extends Model
{
    protected $table = 'patente_status';
    protected $fillable = ['nome', 'descricao'];

    public function registros()
    {
        return $this->hasMany(Registro::class, 'status_id');
    }
}
