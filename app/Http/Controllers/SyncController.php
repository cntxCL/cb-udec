<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;

class SyncController extends ApiController
{
    //

    public function addPersonal(Request $request)
    {
    	$data = json_decode($request->input("data"));
    	foreach ($data as $key => $value) {
    		$personal = Personal::create($value);
    		$personal->save();
    	}
    	return response()->json(["status" : "OK"])
    }

    public function deletePersonal(Request $request)
    {
    	$data = json_decode($request->input("data"));
    	foreach ($data as $key => $value) {
    		$personal = Personal::find($value);
    		$personal->delete();
    	}
    	return response()->json(["status" : "OK"])
    }
}
