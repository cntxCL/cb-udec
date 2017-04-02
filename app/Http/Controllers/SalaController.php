<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return(view('salas.index'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return(view('salas.create'))
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return(view('salas.show'))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return(view('salas.edit'))
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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