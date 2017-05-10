<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'laboratorios';
    protected $fillable = ["nombre", "jefe_id"];


	public function jefe()
    {
    	return $this->belongsTo("App\Personal");
    }

}
