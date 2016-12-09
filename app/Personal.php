<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillabe = ['nombre', 'apellido', 'correo', 'cargo', 'telefono'];

}
