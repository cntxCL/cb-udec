<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = ['nombre', 'apellido', 'correo', 'cargo', 'telefono', "reloj_id"];

}
