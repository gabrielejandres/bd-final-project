<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Http\Controllers\MediaController;

class SeriesController extends Controller
{
    public function create(Request $request){
        $mediaController = new MediaController;
        $media = $mediaController->create($request);

    	$series = new Series;
    	$series->num_seasons = $request->num_seasons;
        $series->media_id = $media->getData()->id;
    	$series->save();

    	return $this->show($series->media_id);
    }

    public function index(){
    	$series = Series::join('media', 'id', '=', 'media_id')
                        ->get();

        foreach ($series as $s) {
            $mediaController = new MediaController;
            $media = $mediaController->show($s->media_id)->original;
            $s->genres = $media->genres;
            $s->actors = $media->actors;
            $s->directors = $media->directors;
        }

        return response()->json($series);
    }

    public function show($media_id){
        $series = Series::where('media_id', $media_id)
                        ->join('media', 'id', '=', 'media_id')
                        ->first();

        $mediaController = new MediaController;
        $media = $mediaController->show($series->media_id)->original;
        $series->genres = $media->genres;
        $series->actors = $media->actors;
        $series->directors = $media->directors;

    	return response()->json($series);
    }

    public function update(Request $request, $media_id){
    	$series = Series::where('media_id', $media_id)->first();

        if ($series) {
            if ($request->num_seasons)
                $series->num_seasons = $request->num_seasons;

            if ($request->media_id)
                $series->media_id = $request->media_id;

            if ($request->name || $request->release_year || $request->parental_rating || $request->description) {
                $mediaController = new MediaController;
                $media = $mediaController->update($request, $media_id);
            }

            $series->save();
            return $this->show($media->getData()->id);
        } else {
            return response()->json(['Esta serie nao existe']);
        }
    }

    public function delete($media_id){
    	Series::where('media_id', $media_id)->delete();
        $mediaController = new MediaController;
        $media = $mediaController->delete($media_id);

    	return response()->json(['Serie deletada com sucesso']);
    }
}
