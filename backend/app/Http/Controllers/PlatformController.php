<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function create(Request $request){
    	$platform = new Platform;

    	$platform->name = $request->name;
    	$platform->save(); 

    	return response()->json($platform); 
    }

    public function index(){
    	$platform = Platform::all(); 

    	return response()->json($platform);
    }

    public function show($id){
    	$platform = Platform::findOrFail($id);

    	return response()->json($platform);
    }

    public function update(Request $request, $id){
    	$platform = Platform::find($id);

        if ($platform) {
            if ($request->name) 
                $platform->name = $request->name;
                
            $platform->save(); 
            return response()->json($platform); 
        } else {
            return response()->json(['Esta plataforma nao existe']);
        }	
    }

    public function delete($id){
    	Platform::destroy($id);

    	return response()->json(['Plataforma deletada com sucesso']); 
    }
}
