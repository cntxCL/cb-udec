<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $fillable = ['descripcion'];
	 protected $table = 'motivo';
}

