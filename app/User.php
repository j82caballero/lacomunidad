<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'telefono', 'observaciones', 'email', 'password', 'perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function setPasswordAttribute($value)
    {

        if ( ! empty($value)) {

            $this->attributes['password'] = bcrypt($value);

        }

    }

    // Un propietario puede tener muchas propiedades
    public function propiedad()
    {

        return $this->hasMany(Propiedades::class);

    }

    // Un propietario pertenece a una comunidad
    public function propietario() 
    {
        return $this->belongsTo(Comunidad::class, 'comunidad_id');
    }

    // Tipo de pago
    public function tipoPago()
    {
        return $this->belongsTo(TiposPagos::class, 'tipospagos_id');
    }
    
    public function informacion ()
    {
        $result = '';

        $result .= $this->perfil == 'admin' ? 'Administrador' : 'Usuario';
        $result .= $this->vive_aqui == '1' ? ' | Vive aqui' : ' | No vive aqui';
        $result .= $this->contacto_principal == '1' ? ' | Contacto principal' : '';
        $result .= $this->dueno == '1' ? ' | Dueño' : '';

        return $result;
    }

    // Un propietario tiene muchos movimientos (contabilidad)
    public function movimientos()
    {
        return $this->hasMany(Contabilidad::class, 'propietario_id');
    }


}
