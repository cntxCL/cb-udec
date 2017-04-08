<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function reservas_public()
    {
    	$salas = \App\Salas::all();
    	return view('public', compact('salas'));
    }
}
