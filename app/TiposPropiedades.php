<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposPropiedades extends Model
{
    protected $table = 'tipospropiedades';

    protected $fillable = [
        'codigo', 'descripcion'
    ];
}
