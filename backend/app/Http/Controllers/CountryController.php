<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function create(Request $request){
    	$country = new Country;

        $country->code = $request->code;
    	$country->name = $request->name;
        $country->media_id = $request->media_id;
    	$country->save(); 

    	return response()->json($country); 
    }

    public function index(){
    	$countries = Country::all(); 

    	return response()->json($countries);
    }

    public function show($id){
    	$country = Country::findOrFail($id);

    	return response()->json($country);
    }

    public function update(Request $request, $id){
    	$country = Country::find($id);

        if ($country) {
            if ($request->name) 
                $country->name = $request->name;

            if ($request->code)   
                $country->code = $request->code;

            if ($request->media_id) 
                $country->media_id = $request->media_id;

            $country->save(); 
            return response()->json($country); 
        } else {
            return response()->json(['Este pais nao existe']);
        }	
    }

    public function delete($id){
    	Country::destroy($id);

    	return response()->json(['Pais deletado com sucesso']); 
    }
}
