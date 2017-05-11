<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;
use App\Personal;
use App\Http\Requests\LabRequest;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Lab::all();
        return view('labs.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personals = Personal::all();
        foreach ($personals as $persona) {
            $personal[$persona->id] = $persona->nombre_completo;
        }
        return view('labs.create',compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabRequest $request)
    {
        $item = Lab::create($request->all());
        return redirect()->route("labs.show", [$item->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Lab::findOrFail($id);
        return view('labs.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Lab::findOrFail($id);
        $personals = Personal::all();
        foreach ($personals as $persona) {
            $personal[$persona->id] = $persona->nombre_completo;
        }
        return view('labs.edit',compact('personal','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LabRequest $request, $id)
    {
        $item = Lab::findOrFail($id);
        $item->update($request->all());
        return redirect()->route("labs.show", [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lab::destroy($id);
        return redirect()->route("labs.index");
    }
}
