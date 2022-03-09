<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function create(Request $request){
    	$platform = new Platform;

    	$platform->name = $request->name;
    	$platform->save(); 

    	return response()->json($platform); 
    }

    public function index(){
    	$platforms = Platform::all(); 

    	return response()->json($platforms);
    }

    public function show($id){
    	$platform = Platform::findOrFail($id);

    	return response()->json($platform);
    }

    public function update(Request $request, $id){
    	$platform = Platform::find($id);

        if ($platform) {
            if ($request->name) 
                $platform->name = $request->name;
                
            $platform->save(); 
            return response()->json($platform); 
        } else {
            return response()->json(['Esta plataforma nao existe']);
        }	
    }

    public function delete($id){
    	Platform::destroy($id);

    	return response()->json(['Plataforma deletada com sucesso']); 
    }

    // Question functions
    public function getPlatformWithMoreMediasQuestion() {
        // making the question
        $question = 'Qual plataforma tem mais títulos no catálogo?';

        // getting a valid answer
        $answer = Platform::selectRaw('name, count(media_platform.media_id) as num_titles')
                    ->join('media_platform', 'media_platform.platform_id', '=', 'platforms.id')
                    ->groupBy('platforms.name')
                    ->orderByDesc('num_titles')
                    ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Platform::selectRaw('name, count(media_platform.media_id) as num_titles')
                        ->join('media_platform', 'media_platform.platform_id', '=', 'platforms.id')
                        ->groupBy('platforms.name')
                        ->orderBy('num_titles')
                        ->where('name', '!=', $answer)
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();            

        $optionsArray = [];
        for ($i = 0; $i < count($options); $i++) {
            $optionsArray[$i] = $options[$i]->name;
        }
        array_push($optionsArray, $answer);

        // randomizing options
        shuffle($optionsArray);

        return response()->json([
            'question' => $question,
            'options' => $optionsArray,
            'answer' => $answer
        ]);
    }
}
