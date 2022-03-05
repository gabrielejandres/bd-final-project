<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\MediaController;

class MovieController extends Controller
{
    public function create(Request $request){
        $mediaController = new MediaController;
        $media = $mediaController->create($request);

    	$movie = new Movie;
    	$movie->duration = $request->duration;
        $movie->media_id = $media->getData()->id;
    	$movie->save();

    	return $this->show($movie->media_id);
    }

    public function index(){
        $movies = Movie::join('media', 'id', '=', 'media_id')
                        ->get();

        foreach ($movies as $movie) {
            $mediaController = new MediaController;
            $media = $mediaController->show($movie->media_id)->original;
            $movie->genres = $media->genres;
        }

    	return response()->json($movies);
    }

    public function show($media_id){
        $movie = Movie::where('media_id', $media_id)
                        ->join('media', 'id', '=', 'media_id')
                        ->first();

        $mediaController = new MediaController;
        $media = $mediaController->show($movie->media_id)->original;
        $movie->genres = $media->genres;

    	return response()->json($movie);
    }

    public function update(Request $request, $media_id){
    	$movie = Movie::where('media_id', $media_id)->first();

        if ($movie) {
            if ($request->duration)
                $movie->duration = $request->duration;

            if ($request->media_id)
                $movie->media_id = $request->media_id;

            if ($request->name || $request->release_year || $request->parental_rating || $request->description) {
                $mediaController = new MediaController;
                $media = $mediaController->update($request, $media_id);
            }

            $movie->save();
            return $this->show($media->getData()->id);
        } else {
            return response()->json(['Este filme nao existe']);
        }
    }

    public function delete($media_id){
    	Movie::where('media_id', $media_id)->delete();
        $mediaController = new MediaController;
        $media = $mediaController->delete($media_id);

    	return response()->json(['Filme deletado com sucesso']);
    }
}
