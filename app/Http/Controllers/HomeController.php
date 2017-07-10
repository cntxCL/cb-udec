<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salas;
use App\Motivo;
use App\Personal;
use App\User;

class HomeController extends Controller
{
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['reservasPublic','listadoPersonal']]);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('index');
	}

	public function reservasPublic()
	{
		$salas = Salas::all();
		$motivos_list = Motivo::all();
		$motivos = [];
		foreach ($motivos_list as $motivo) {
			$motivos[$motivo->id] = $motivo->descripcion;
		}
		return view('public.reservas', compact('salas','motivos'));
	}

	public function listadoPersonal()
	{
		$items = Personal::all();
		return view('public.personal',compact('items'));
	}

    public function viewedNotifications(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        // $user = User::find($request->get('user_id'));
        foreach ($user->notifications_unreaded as $notification) {
            $notification->viewed = 1;
            $notification->save();
        }
        return response()->json(['status' => 'success', 'message' => 'Notificaciones vistas']);
    }

}
