<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservas;
use App\Http\Requests\ReservasRequest;

class ReservaController extends Controller
{
    //

    public function index()
    {
    	$personals = \App\Personal::all();
    	$salas_list = \App\Salas::all();
        $personal = [];
        foreach ($personals as $persona) {
            $personal[$persona->id] = $persona->nombre . " " . $persona->apellido;
        }
        $salas = [];
        foreach ($salas_list as $sala) {
            $salas[$sala->id] = $sala->nombre;
        }
    	return view("reservas.index")->with(['personal'=>$personal, 'salas' => $salas]);
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
            	"personal" => $reserva->personal->nombre . " " . $reserva->personal->apellido,
            	"id" => $reserva->id
            ];
            return response()->json(['flag'=>true, 'titulo'=>'Todo Bien', 'content'=> $reservaResponse]);
        }
        catch(Exception $e)
        {
            return response()->json(['flag' => false, 'titulo'=>'Error', 'content'=>'Problemas al guardar Reserva']);
        }

    }

    public function update(ReservasRequest $request, $id)
    {
        try
        {
            $reserva = Reservas::findOrFail($id);
            $reserva->update($request->all());
            return redirect()->route('reservas.show', [$reserva->id]);
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
