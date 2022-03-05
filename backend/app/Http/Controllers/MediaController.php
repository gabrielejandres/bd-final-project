<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

// Many to many relationships
use App\Models\Genre;

class MediaController extends Controller
{
    public function create(Request $request){
    	$media = new Media;

    	$media->name = $request->name;
        $media->release_year = $request->release_year;
        $media->parental_rating = $request->parental_rating;
        $media->description = $request->description;
    	$media->save();

    	return response()->json($media);
    }

    public function index(){
    	$medias = Media::with('countries')
                        ->with('genres')
                        ->get();

    	return response()->json($medias);
    }

    public function show($id){
        $media = Media::with('countries')
                        ->with('genres')
                        ->where('id', $id)
                        ->first();

    	return response()->json($media);
    }

    public function update(Request $request, $id){
    	$media = Media::find($id);

        if ($media) {
            if ($request->name)
                $media->name = $request->name;

            if ($request->release_year)
                $media->release_year = $request->release_year;

            if ($request->parental_rating)
                $media->parental_rating = $request->parental_rating;

            if ($request->description)
                $media->description = $request->description;

            $media->save();
            return response()->json($media);
        } else {
            return response()->json(['Esta midia nao existe']);
        }
    }

    public function delete($id){
    	Media::destroy($id);

    	return response()->json(['Midia deletada com sucesso']);
    }

    // Relationship functions
    public function createRelationshipWithGenre(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $genre = Genre::find($request->genre_id);

    	$media->genres()->attach($genre);
    	$media->save();

    	return response()->json(['Relação entre midia e genero criada com sucesso']);
    }
}
