<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function create(Request $request){
    	$director = new Director;

    	$director->name = $request->name;
        $director->profile_photo = $request->profile_photo;
    	$director->save(); 

    	return response()->json($director); 
    }

    public function index(){
    	$users = Director::all(); 

    	return response()->json($users);
    }

    public function show($id){
    	$director = Director::findOrFail($id);

    	return response()->json($director);
    }

    public function update(Request $request, $id){
    	$director = Director::find($id);

        if ($director) {
            if ($request->name) 
                $director->name = $request->name;

            if ($request->profile_photo)   
                $director->profile_photo = $request->profile_photo;

            $director->save(); 
            return response()->json($director); 
        } else {
            return response()->json(['Este diretor nao existe']);
        }	
    }

    public function delete($id){
    	Director::destroy($id);

    	return response()->json(['Diretor deletado com sucesso']); 
    }
}
