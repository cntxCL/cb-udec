<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = ['rut', 'nombre', 'apellido', 'cargo', 'telefono', "reloj_id"];

}
