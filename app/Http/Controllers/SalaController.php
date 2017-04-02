<?php

namespace App\Http\Controllers;

use App\Salas;
use App\Http\Requests\SalaRequest;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salas.index', ['items' => Salas::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaRequest $request)
    {
        $sala = Salas::create($request->all());
        return redirect()->route('salas.show', [$sala->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('salas.show', ['item' => Salas::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('salas.edit', ['item' => Salas::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaRequest $request, $id)
    {
        $sala = Salas::findOrFail($id);
        $sala->update($request->all());
        return redirect()->route('salas.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Salas::findOrFail($id);
        $sala->delete();
        return redirect()->route('salas.index');
    }

    public function getReservas($id){
        try{
            $reservas = \App\Salas::find($id)->reservas();
            $reservasResponse = [];
            foreach ($reservas->get() as $reserva) {
                $reservasResponse[] = [
                    "inicio" => $reserva->inicio,
                    "fin" => $reserva->fin,
                    "personal" => $reserva->personal->nombre . " " . $reserva->personal->apellido,
                    "id" => $reserva->id
                ];
            }
            return response()->json(['flag'=>true, 'titulo'=>'Todo Bien', 'content'=> $reservasResponse ]);
        }
        catch(Exception $e)
        {
            return response()->json(['flag' => false, 'titulo'=>'Error', 'content'=>'Error al Obtener Reservas']);
        }
    }
}
