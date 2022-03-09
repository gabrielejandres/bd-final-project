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

    // Question functions
    public function getActorPhotoQuestion() {
        // making the question
        $question = 'Quem é o ator abaixo?';

        // getting a valid answer
        $answer = Actor::inRandomOrder()
                        ->first();

        $photo = $answer ? $answer->profile_photo : '';
        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Actor::select('name')
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
            'photo' => $photo,
            'options' => $optionsArray,
            'answer' => $answer
        ]);
    }
}
