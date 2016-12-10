<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;

class SyncController extends ApiController
{
    //

    public function addPersonal(Request $request)
    {
    	$data = $request->json()->all();
    	foreach ($data["data"] as $key => $value) {
    		$personal = Personal::create($value);
    		$personal->save();
    	}
    	return response()->json(["status" => "OK"]);
    }

    public function deletePersonal(Request $request)
    {
    	$data = $request->json()->all();
    	foreach ($data["data"] as $key => $value) {
    		$personal = Personal::where("reloj_id", $value)->first();
    		$personal->delete();
    	}
    	return response()->json(["status" => "OK"]);
    }

    public function inoutPersonal(Request $request)
    {
    	
    }
}
