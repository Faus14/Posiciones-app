<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = ['cuit', 'razonSocial'];

    public function posiciones()
    {
        return $this->hasMany(Posicion::class, 'idEmpresa');
    }
}
