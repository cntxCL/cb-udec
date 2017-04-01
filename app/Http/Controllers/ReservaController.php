<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    //

    public function index()
    {
    	$personals = \App\Personal::all();
    	$personal = [];
        foreach ($personals as $persona) {
            $personal[$persona->id] = $persona->nombre . " " . $persona->apellido;
        }
    	return view("reservas.index")->withPersonal($personal);
    }
}
