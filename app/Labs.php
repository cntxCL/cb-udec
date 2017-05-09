<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    protected $table = 'laboratorios';
    protected $fillable = ["nombre", "jefe_id"];


	public function Jefe()
    {
    	return $this->belongsTo("App\Personal");
    }

}
