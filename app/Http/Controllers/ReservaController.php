<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservas;
use App\Http\Requests\ReservasRequest;

class ReservaController extends Controller
{
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'store']);
	}

	public function index()
	{
		$salas_list = \App\Salas::all();
		$motivos_list = \App\Motivo::all();
		$motivos = [];
		foreach ($motivos_list as $motivo) {
			$motivos[$motivo->id] = $motivo->descripcion;
		}
		return view("reservas.index")->with(['salas' => $salas_list, 'motivos' => $motivos]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ReservasRequest $request)
	{
		try{
			$reserva = Reservas::create($request->all());
			$reserva->save();
			$reservaResponse = [
				"inicio" => $reserva->inicio->format("d/m/Y H:i"),
				"fin" => $reserva->fin->format("d/m/Y H:i"),
				"responsable" => $reserva->responsable,
				"motivo" => $reserva->motivo->descripcion,
				"id" => $reserva->id
			];
			return response()->json(['flag'=>true, 'titulo'=>'Todo Bien', 'content'=> $reservaResponse]);
		}
		catch(Exception $e)
		{
			return response()->json(['flag' => false, 'titulo'=>'Error', 'content'=>'Problemas al guardar Reserva.']);
		}

	}

	public function update(ReservasRequest $request, $id)
	{
		try
		{
			$reserva = Reservas::findOrFail($id);
			if($request->deleteFlag){
				$reserva->delete();
			}
			if($request->acceptFlag){
				$reserva->aceptado = true;
				$reserva->save();
			}
			return view("reservas.show");
		}catch(ModelNotFoundException $e)
		{
			Session::flash([
				"title" => "Reserva no encontrada",
				"message" => "No hemos encontrado la reserva seleccionado",
				"alert" => "danger"
			]);
		}
	}

	public function edit($id)
	{
		$reserva = Reservas::find($id);
		return view("reservas.edit")->withItem($reserva);

	}



}
