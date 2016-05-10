<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposPagos extends Model
{
    protected $table = 'tipospagos';

    protected $fillable = [
        'codigo', 'descripcion'
    ];
    
    public function pago() {

        return $this->codigo . '-' . $this->descripcion;
        
    }
}
