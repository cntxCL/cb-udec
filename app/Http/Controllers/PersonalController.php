<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\PersonalRequest;
use App\Personal;
use App\Archivo;

class PersonalController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		return view("personal.index")->withItems(Personal::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view("personal.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PersonalRequest $request)
	{
		if(!$request->cargo) {
			$request["cargo"] = '';
		}

		if($request->telefono == '') {
			$request["telefono"] = null;
		}

		if ($request->hasFile('cv')) {
			$file = $request->file('cv');
			$nombre = $file->getClientOriginalName();
			$hash = $request->cv->store('public');
			$archivo = Archivo::create(["nombre" => $nombre, "hash"=>basename($hash)]);
			$request["cv_id"]=$archivo->id;
		}
		else{
			$request["cv_id"]= null;
		}
		$personal = Personal::create($request->all());

		return redirect()->route('personal.show', [$personal->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
		$personal = Personal::find($id);
		return view("personal.show")->withItem($personal);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$personal = Personal::find($id);
		return view("personal.edit")->withItem($personal);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PersonalRequest $request, $id)
	{
		//
		try
		{
			$personal = Personal::findOrFail($id);

			if(!$request->cargo) {
				$request["cargo"] = '';
			}

			if($request->telefono == '') {
				$request["telefono"] = null;
			}

			if ($request->hasFile('cv')) {
				$file = $request->file('cv');
				$nombre = $file->getClientOriginalName();
				$hash = $request->cv->store('public');
				$archivo = Archivo::create(["nombre" => $nombre, "hash"=>basename($hash)]);
				$request["cv_id"]=$archivo->id;
			}
			else{
				$request["cv_id"]= $personal->cv_id;
			}
			$personal->update($request->all());
			return redirect()->route('personal.show', [$personal->id]);
		}catch(ModelNotFoundException $e)
		{
			Session::flash([
				"title" => "Personal no encontrado",
				"message" => "No hemos encontrado el personal seleccionado",
				"alert" => "danger"
			]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		try
		{
			$personal = Personal::findOrFail($id);
			$personal->delete();
			return redirect()->route('personal.index');
		}catch(Exception $e)
		{
			Session::flash(["title" => "Error eliminando personal", "message" => "No hemos podido eliminar el personal seleccionado", "alert" => "danger"]);
		}
	}

	/**
	 * Obtiene los cargos del personal
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getCargos()
	{
		$cargos = \DB::table('personal')->distinct()->pluck('cargo');
		$json = [];
		foreach ($cargos as $cargo) {
			$json[] = ['id' => $cargo, 'text' => $cargo];
		}

		return $json;
	}

	public function getContratos($id){
		try {
			$personal = Personal::findOrFail($id);
			$contratos = $personal->contratos()->get();
			return view("contratos.index")->with(array("items"=>$contratos,"personal"=>$personal));
		} catch (Exception $e) {
			Session::flash([
				"title" => "Contrato no encontrado",
				"message" => "Personal no cuenta con contratos Asociados",
				"alert" => "danger"
			]);
		}
	}
	public function getInOut($id){
		try {
			$personal = Personal::findOrFail($id);
			$entradas = $personal->entradas()->get();
			$salidas = $personal->salidas()->get();
			return view("personal.inout")->with(array(
					"entradas"=>$entradas,
					"salidas"=>$salidas,
					"personal"=>$personal
					));
		} catch (Exception $e) {
			Session::flash([
				"title" => "Contrato no encontrado",
				"message" => "Personal no cuenta con contratos Asociados",
				"alert" => "danger"
			]);
		}
	}


}
