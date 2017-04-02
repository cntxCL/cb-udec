<?php

namespace App\Http\Controllers;

use App\Motivo;
use App\Http\Requests\MotivoRequest;

class MotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('motivos.index', ['items' => Motivo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotivoRequest $request)
    {
        $motivo = Motivo::create($request->all());
        return redirect()->route('motivos.show', [$motivo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('motivos.show', ['item' => Motivo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('motivos.edit', ['item' => Motivo::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotivoRequest $request, $id)
    {
        $motivo = Motivo::findOrFail($id);
        $motivo->update($request->all());
        return redirect()->route('motivos.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motivo = Motivo::findOrFail($id);
        $motivo->delete();
        return redirect()->route('motivos.index');
    }

}
