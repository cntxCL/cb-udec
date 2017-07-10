<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;

class ArchivosController extends Controller
{
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('log')->only(['store', 'update', 'destroy']);
	}

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		try {
			$archivo = Archivo::findOrFail($id);
			$public_path = public_path();
		    $url = $public_path.'/storage/'.$archivo->hash;
		    return response()->download($url,$archivo->nombre);
		} catch (Exception $e) {
			Session::flash([
				"title" => "Archivo no encontrado",
				"message" => "No hemos encontrado el archivo Seleccionado",
				"alert" => "danger"
			]);
		}
	}
}
