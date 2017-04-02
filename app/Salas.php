<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    protected $table = 'salas';

    public function reservas(){
    	return $this->hasMany('App\Reservas','sala_id');
    }

}
