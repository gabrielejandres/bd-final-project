<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

// Many to many relationships
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;

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
                        ->with('actors')
                        ->with('directors')
                        ->get();

    	return response()->json($medias);
    }

    public function show($id){
        $media = Media::with('countries')
                        ->with('genres')
                        ->with('actors')
                        ->with('directors')
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

    public function createRelationshipWithDirector(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $director = Director::find($request->director_id);

    	$media->directors()->attach($director);
    	$media->save();

    	return response()->json(['Relação entre midia e diretor criada com sucesso']);
    }

    public function createRelationshipWithActor(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $actor = Actor::find($request->actor_id);

    	$media->actors()->attach($actor);
    	$media->save();

    	return response()->json(['Relação entre midia e ator criada com sucesso']);
    }
}
