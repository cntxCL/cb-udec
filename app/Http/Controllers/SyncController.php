<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Ingreso;
use App\Salida;

class SyncController extends ApiController
{
    //

    public function addPersonal(Request $request)
    {
    	$data = $request->json()->all();
    	foreach ($data as $key => $value) {
    		$personal = Personal::create($value);
    		$personal->save();
    	}
    	return response()->json(["status" => "OK"]);
    }

    public function deletePersonal(Request $request)
    {
    	$data = $request->json()->all();
    	foreach ($data as $key => $value) {
    		$personal = Personal::where("reloj_id", $value)->first();
            if($personal == null) continue;
    		$personal->delete();
    	}
    	return response()->json(["status" => "OK"]);
    }

    public function inoutPersonal(Request $request)
    {
    	$data = $request->json()->all();
    	foreach ($data as $key => $value) {
    		$personal = Personal::where("reloj_id", $value["userid"])->first();
            if($personal == null) continue;
            $checkData = [
                "personal_id" => $personal->id,
                "fecha" => $value["checktime"]
            ];
            if($value["checktype"] == "I")
                $check = Ingreso::create($checkData);
            else
                $check = Salida::create($checkData);
            $check->save();
    	}	
        return response()->json(["status" => "OK"]);
    }
}
