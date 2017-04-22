<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salas;
use App\Motivo;
use App\Personal;

class HomeController extends Controller
{
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'reservas_public']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('index');
	}

	public function reservas_public()
	{
		$personal_list = \App\Personal::all();
		$salas = Salas::all();
		$motivos_list = \App\Motivo::all();
		$personal = [];
		$motivos = [];
		foreach ($personal_list as $persona) {
			$personal[$persona->id] = $persona->nombre . " " . $persona->apellido;
		}
		foreach ($motivos_list as $motivo) {
			$motivos[$motivo->id] = $motivo->descripcion;
		}
		return view('public', compact('salas','motivos','personal'));
	}
}
