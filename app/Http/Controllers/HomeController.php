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
		$salas = Salas::all();
		$motivos_list = Motivo::all();
		$motivos = [];
		foreach ($motivos_list as $motivo) {
			$motivos[$motivo->id] = $motivo->descripcion;
		}
		return view('public.reservas', compact('salas','motivos'));
	}

	public function listadoPersonal()
	{
		$items = Personal::all();
		return view('public.personal',compact('items'));
	}
}
