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
		$this->middleware('auth', ['except' => ['reservasPublic','listadoPersonal']]);
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

	public function reservasPublic()
	{
		$personal_list = Personal::all();
		$salas = Salas::all();
		$motivos_list = Motivo::all();
		$personal = [];
		$motivos = [];
		foreach ($personal_list as $persona) {
			$personal[$persona->id] = $persona->nombre . " " . $persona->apellido;
		}
		foreach ($motivos_list as $motivo) {
			$motivos[$motivo->id] = $motivo->descripcion;
		}
		return view('public.reservas', compact('salas','motivos','personal'));
	}

	public function listadoPersonal()
	{
		$items = Personal::all();
		return view('public.personal',compact('items'));
	}
}
