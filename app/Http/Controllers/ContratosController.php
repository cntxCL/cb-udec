<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Proyecto;
use App\Personal;
use App\Http\Requests\ContratosRequest;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("contratos.index")->withItems(Contrato::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("contratos.create")
            ->withProyectos(Proyecto::all())
            ->withPersonal(Personal::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratosRequest $request)
    {
        //
        $contrato = Contrato::create($request->all());
        $contrato->save();
        return redirect()->route("contratos.show", [$contrato->id]);

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
        $contrato = Contrato::findOrFail($id);
        return view("contratos.show")->withItem($contrato);
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
        return view("contratos.edit")
            ->withItem(Contrato::find($id))
            ->withProyectos(Proyecto::all())
            ->withPersonal(Personal::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratosRequest $request, $id)
    {
        //
        try
        {
            $contrato = Contrato::findOrFail($id);
            $contrato->update($request->all());
            return redirect()->route('contratos.show', [$contrato->id]);
        }catch(ModelNotFoundException $e)
        {
            Session::flash([
                "title" => "Contrato no encontrado",
                "message" => "No hemos encontrado el contrato seleccionado",
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
            $contrato = Contrato::findOrFail($id);
            $contrato->delete();
            return redirect()->route('contratos.index');
        }catch(Exception $e)
        {
            Session::flash(["title" => "Error eliminado contrato", "message" => "No hemos podido eliminar el contrato seleccionado", "alert" => "danger"]);
        }
    }
}
