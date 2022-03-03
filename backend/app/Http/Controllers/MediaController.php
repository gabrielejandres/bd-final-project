<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

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
    	$medias = Media::with('countries')->get(); 

    	return response()->json($medias);
    }

    public function show($id){
        $media = Media::with('countries')->where('id', $id)->first();

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
}
