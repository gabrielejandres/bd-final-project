<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create(Request $request){
    	$genre = new Genre;

    	$genre->name = $request->name;
    	$genre->save(); 

    	return response()->json($genre); 
    }

    public function index(){
    	$genres = Genre::all(); 

    	return response()->json($genres);
    }

    public function show($id){
    	$genre = Genre::findOrFail($id);

    	return response()->json($genre);
    }

    public function update(Request $request, $id){
    	$genre = Genre::find($id);

        if ($genre) {
            if ($request->name) 
                $genre->name = $request->name;
                
            $genre->save(); 
            return response()->json($genre); 
        } else {
            return response()->json(['Este genero nao existe']);
        }	
    }

    public function delete($id){
    	Genre::destroy($id);

    	return response()->json(['Genero deletado com sucesso']); 
    }
}
