<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motivo extends Model
{
    protected $fillable = ['descripcion'];
	protected $table = 'motivo';

	use SoftDeletes;

    protected $dates = ['deleted_at'];
}

