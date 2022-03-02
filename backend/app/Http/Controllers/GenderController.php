<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function create(Request $request){
    	$gender = new Gender;

    	$gender->name = $request->name;
    	$gender->save(); 

    	return response()->json($gender); 
    }

    public function index(){
    	$gender = Gender::all(); 

    	return response()->json($gender);
    }

    public function show($id){
    	$gender = Gender::findOrFail($id);

    	return response()->json($gender);
    }

    public function update(Request $request, $id){
    	$gender = Gender::find($id);

        if ($gender) {
            if ($request->name) 
                $gender->name = $request->name;
                
            $gender->save(); 
            return response()->json($gender); 
        } else {
            return response()->json(['Este genero nao existe']);
        }	
    }

    public function delete($id){
    	Gender::destroy($id);

    	return response()->json(['Genero deletado com sucesso']); 
    }
}
