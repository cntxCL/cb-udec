<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    protected $fillable = ['nombre', 'capacidad', 'max_tiempo_reserva'];
    protected $table = 'salas';

    public function reservas(){
    	return $this->hasMany('App\Reservas','sala_id');
    }

}
