<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    protected $table = 'comunidad';

    protected $fillable = [
        'nombre', 'cif', 'direccion', 'provincia', 'poblacion', 'codpostal', 'descripcion', 'image'
    ];

    // Una comunidad puede tener muchos propietarios
    public function propietarios()
    {
        return $this->hasMany(User::class);
    }

}
