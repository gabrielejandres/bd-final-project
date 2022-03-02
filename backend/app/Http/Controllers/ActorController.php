<?php

namespace App\Http\Controllers;
use App\Models\Actor;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function create(Request $request){
    	$actor = new Actor;

    	$actor->name = $request->name;
        $actor->profile_photo = $request->profile_photo;
    	$actor->save(); 

    	return response()->json($actor); 
    }

    public function index(){
    	$actors = Actor::all(); 

    	return response()->json($actors);
    }

    public function show($id){
    	$actor = Actor::findOrFail($id);

    	return response()->json($actor);
    }

    public function update(Request $request, $id){
    	$actor = Actor::find($id);

        if ($actor) {
            if ($request->name) 
                $actor->name = $request->name;

            if ($request->profile_photo)   
                $actor->profile_photo = $request->profile_photo;

            $actor->save(); 
            return response()->json($actor); 
        } else {
            return response()->json(['Este ator nao existe']);
        }	
    }

    public function delete($id){
    	Actor::destroy($id);

    	return response()->json(['Ator deletado com sucesso']); 
    }
}
