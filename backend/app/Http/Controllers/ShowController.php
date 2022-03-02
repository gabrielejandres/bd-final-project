<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class ShowController extends Controller
{
    public function create(Request $request){
    	$show = new Show;

    	$show->name = $request->name;
        $show->release_year = $request->release_year;
        $show->parental_rating = $request->parental_rating;
        $show->description = $request->description;
    	$show->save(); 

    	return response()->json($show); 
    }

    public function index(){
    	$shows = Show::with('countries')->get(); 

    	return response()->json($shows);
    }

    public function show($id){
        $show = Show::with('countries')->where('id', $id)->first();

    	return response()->json($show);
    }

    public function update(Request $request, $id){
    	$show = Show::find($id);

        if ($show) {
            if ($request->name) 
                $show->name = $request->name;

            if ($request->release_year)   
                $show->release_year = $request->release_year;

            if ($request->parental_rating)
                $show->parental_rating = $request->parental_rating;  
                
            if ($request->description)
                $show->description = $request->description;

            $show->save(); 
            return response()->json($show); 
        } else {
            return response()->json(['Este show nao existe']);
        }	
    }

    public function delete($id){
    	Show::destroy($id);

    	return response()->json(['Show deletado com sucesso']); 
    }
}
