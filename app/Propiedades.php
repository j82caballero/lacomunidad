<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{
    protected $table = 'propiedades';

    protected $fillable = [
        'codigo', 'descripcion', 'tipospropiedades_id'
    ];

    public function tipoPropiedad()
    {
        return $this->belongsTo(TiposPropiedades::class, 'tipospropiedades_id');
    }

    // Una propiedad pertenece a un propietario
    public function propietario() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Una garaje pertenece a un propietario
    public function garaje() {
        return $this->belongsTo(Garaje::class, 'garaje_id');
    }

    public function propiedad() {
        return $this->codigo . '-' . $this->descripcion;
    }
}
