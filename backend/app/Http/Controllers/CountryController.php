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
}
