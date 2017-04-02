<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';


    protected $fillable = ["inicio", "fin", "aceptado", "motivo_id", "sala_id", "personal_id"];

    public function setInicioAttribute($value)
    {
    	$this->attributes["inicio"] = Carbon::createFromFormat('d/m/Y H:i:s', $value); 
    }

    public function setFinAttribute($value)
    {
    	$this->attributes["fin"] = Carbon::createFromFormat('d/m/Y H:i:s', $value); 
    }

    public function Personal(){
    	return $this->belongsTo("App\Personal");
    }

    public function Sala(){
    	return $this->belongsTo("App\Salas");
    }

    public function Motivo(){
    	return $this->belongsTo("App\Motivo");
    }
}
