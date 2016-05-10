<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contabilidad extends Model
{
    protected $table = 'contabilidad';

    protected $fillable = [
        'conceptos_id', 'fecha', 'importe', 'comentario', 'tipospagos_id', 'propietario_id', 'comunidad_id'
    ];

    // Concepto
    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'conceptos_id');
    }

    // La contabilidad pertenece a una comunidad
    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class, 'comunidad_id');
    }

    // Tipo de pago
    public function tipoPago()
    {
        return $this->belongsTo(TiposPagos::class, 'tipospagos_id');
    }

    // Un movimiento contablidad pertenece a un propietario
    public function propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }
}
