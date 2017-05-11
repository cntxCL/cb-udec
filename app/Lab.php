<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lab extends Model
{
    use SoftDeletes;
    protected $table = 'laboratorios';
    protected $fillable = ["nombre", "jefe_id"];
    protected $dates = ['deleted_at'];

	public function jefe()
    {
    	return $this->belongsTo("App\Personal");
    }

    public function contratos()
    {
    	return $this->hasMany("App\Contrato","laboratorio_id");
    }

}
