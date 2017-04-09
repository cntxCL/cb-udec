<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ingreso extends Model
{
    //
    protected $fillable = ["fecha", "personal_id"];


    public function setFechaAttribute($value)
    {
    	$this->attributes["fecha"] = Carbon::CreateFromFormat("d/m/Y H:i:s", $value);
    }

    public function getFechaAttribute($value)
    {
    	return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    
}
