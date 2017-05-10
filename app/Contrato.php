<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contrato extends Model
{
    protected $dates = [
        'inicio',
        'fin',
    ];

    protected $fillable = ["inicio", "fin", "proyecto_id", "personal_id"];


    public function setInicioAttribute($value)
    {
    	$this->attributes["inicio"] = Carbon::createFromFormat('d/m/Y', $value); 
    }

    public function setFinAttribute($value)
    {
    	$this->attributes["fin"] = Carbon::createFromFormat('d/m/Y', $value); 
    }
    
    public function Proyecto()
    {
    	return $this->belongsTo("App\Proyecto");
    }

    public function Personal(){
    	return $this->belongsTo("App\Personal");
    }
    public function Labs(){
        return $this->belongsTo("App\Labs");
    }
}
