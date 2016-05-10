<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garaje extends Model
{
    protected $table = 'garajes';

    protected $fillable = [
        'clave', 'descripcion', 'propiedades_id'
    ];


}
