<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\PersonalRequest;
use App\Personal;

class PersonalController extends Controller
{
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
        //
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
            Session::flash(["title" => "Error eliminado personal", "message" => "No hemos podido eliminar el personal seleccionado", "alert" => "danger"]);
        }
    }
}
