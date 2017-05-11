<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = ['rut', 'nombre', 'apellido', 'cargo', 'telefono', "reloj_id", "correo","cv_id"];

    public function contratos()
    {
        return $this->hasMany('App\Contrato','personal_id');
    }

    public function entradas()
    {
        return $this->hasMany('App\Ingreso','personal_id')->orderBy('fecha','desc');
    }

    public function salidas()
    {
        return $this->hasMany('App\Salida','personal_id')->orderBy('fecha','desc');
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . " " . $this->apellido;
    }

}
