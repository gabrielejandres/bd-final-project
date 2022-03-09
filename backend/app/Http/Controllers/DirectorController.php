<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;

class DirectorController extends Controller
{
    public function create(Request $request){
    	$director = new Director;

    	$director->name = $request->name;
        $director->profile_photo = $request->profile_photo;
    	$director->save(); 

    	return response()->json($director); 
    }

    public function index(){
    	$directors = Director::all(); 

    	return response()->json($directors);
    }

    public function show($id){
    	$director = Director::findOrFail($id);

    	return response()->json($director);
    }

    public function update(Request $request, $id){
    	$director = Director::find($id);

        if ($director) {
            if ($request->name) 
                $director->name = $request->name;

            if ($request->profile_photo)   
                $director->profile_photo = $request->profile_photo;

            $director->save(); 
            return response()->json($director); 
        } else {
            return response()->json(['Este diretor nao existe']);
        }	
    }

    public function delete($id){
    	Director::destroy($id);

    	return response()->json(['Diretor deletado com sucesso']); 
    }

    // Question functions
    public function getDirectorWithMoreMoviesQuestion() {
        // making the question
        $question = 'Qual diretor fez mais filmes?';

        // getting a valid answer
        $answer = Director::selectRaw('name, count(director_media.media_id) as num_titles')
                    ->join('director_media', 'director_media.director_id', '=', 'directors.id')
                    ->join('movies', 'director_media.media_id', '=', 'movies.media_id')
                    ->groupBy('directors.name')
                    ->orderByDesc('num_titles')
                    ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Director::where('name', '!=', $answer)
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

    public function getDirectorAndActorQuestion() {
        // making the question
        $question = 'Qual desses diretores também é ator?';

        // getting a valid answer
        $answer = Director::select('name')
                        ->whereIn('directors.name', Actor::select('name'))
                        ->inRandomOrder()
                        ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Director::select('name')
                            ->whereNotIn('directors.name', Actor::select('name'))
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

    public function getDirectorWithMoreMediasByGenreQuestion() {
        // making the question
        $genre = Genre::select('id', 'name')
                        ->inRandomOrder()
                        ->limit(1)
                        ->get()
                        ->toArray();
        $question = 'Qual diretor dirigiu mais mídias do gênero ' . $genre[0]['name'] . '?';

        // getting a valid answer
        $answer = Director::selectRaw('directors.name, count(genre_media.genre_id) as occurrences')
                        ->join('director_media', 'director_media.director_id', '=', 'directors.id')
                        ->join('media', 'director_media.media_id', '=', 'media.id')
                        ->join('genre_media', 'genre_media.media_id', '=', 'media.id')
                        ->where('genre_media.media_id', $genre[0]['id'])
                        ->groupBy('genre_media.genre_id', 'directors.name')
                        ->orderByDesc('occurrences')
                        ->inRandomOrder()
                        ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Director::select('name')
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
