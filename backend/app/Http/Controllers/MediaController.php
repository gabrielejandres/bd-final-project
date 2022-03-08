<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

// Many to many relationships
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Platform;

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
                        ->with('platforms')
                        ->get();

    	return response()->json($medias);
    }

    public function show($id){
        $media = Media::with('countries')
                        ->with('genres')
                        ->with('actors')
                        ->with('directors')
                        ->with('platforms')
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
        $genre = Genre::findOrFail($request->genre_id);

    	$media->genres()->attach($genre);
    	$media->save();

    	return response()->json(['Relação entre midia e genero criada com sucesso']);
    }

    public function createRelationshipWithDirector(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $director = Director::findOrFail($request->director_id);

    	$media->directors()->attach($director);
    	$media->save();

    	return response()->json(['Relação entre midia e diretor criada com sucesso']);
    }

    public function createRelationshipWithActor(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $actor = Actor::findOrFail($request->actor_id);

    	$media->actors()->attach($actor);
    	$media->save();

    	return response()->json(['Relação entre midia e ator criada com sucesso']);
    }

    public function createRelationshipWithPlatform(Request $request){
    	$media = Media::findOrFail($request->media_id);
        $platform = Platform::findOrFail($request->platform_id);

    	$media->platforms()->attach($platform, ['inclusion_date' => $request->inclusion_date]);
    	$media->save();

    	return response()->json(['Relação entre midia e plataforma criada com sucesso']);
    }

    // Question functions
    public function getReleaseYearQuestion() {
        // making the question
        $years = Media::select('release_year')
                        ->inRandomOrder()
                        ->limit(10)
                        ->get()
                        ->toArray(); // get valid years
        $year = $years[array_rand($years)]['release_year']; // using some valid year from database

        $question = 'Qual dessas mídias foi lançada em ' . $year . '?'; 

        // getting a valid answer
        $answer = Media::select('name')
                    ->where('release_year', $year)
                    ->inRandomOrder()
                    ->first();

        // getting options
        $options = Media::select('name')
                        ->where('release_year', '!=', $year)
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();

        $optionsArray = [];
        for ($i = 0; $i < count($options); $i++) {
            $optionsArray[$i] = $options[$i]->name;
        }
        array_push($optionsArray, $answer->name);

        // randomizing options
        shuffle($optionsArray);

        return response()->json([
            'question' => $question,
            'options' => $optionsArray,
            'answer' => $answer->name
        ]);
    }

    public function getTwoPlatformsQuestion() {
        // making the question
        $platforms = Platform::select('id', 'name')
                        ->inRandomOrder()
                        ->limit(2)
                        ->get()
                        ->toArray();
        $question = 'Qual dessas mídias está nas plataformas ' . $platforms[0]['name'] . ' e ' . $platforms[1]['name'] . '?';

        // getting a valid answer
        $answer = Media::select('media.name')
                    ->join('media_platform as m1', 'm1.media_id', '=', 'id')
                    ->join('media_platform as m2', 'm2.media_id', '=', 'id')
                    ->where('m1.platform_id', $platforms[0]['id'])
                    ->where('m2.platform_id', $platforms[1]['id'])
                    ->inRandomOrder()
                    ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Media::select('name')
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

    public function getnotAMovieQuestion() {
        // making the question
        $question = 'Qual desses títulos não é um filme?'; 

        // getting a valid answer
        $answer = Media::select('name')
                    ->join('movies', 'id', '=', 'media_id')
                    ->inRandomOrder()
                    ->first();

        // getting options
        $options = Media::select('name')
                        ->join('series', 'id', '=', 'media_id')
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();

        $optionsArray = [];
        for ($i = 0; $i < count($options); $i++) {
            $optionsArray[$i] = $options[$i]->name;
        }
        array_push($optionsArray, $answer->name);

        // randomizing options
        shuffle($optionsArray);

        return response()->json([
            'question' => $question,
            'options' => $optionsArray,
            'answer' => $answer->name
        ]);
    }

    public function getMovieByPlatform() {
        // making the question
        $platforms = Platform::select('id', 'name')
                        ->inRandomOrder()
                        ->limit(1)
                        ->get()
                        ->toArray();
        $question = 'Qual filme está na plataforma ' . $platforms[0]['name'] . '?';

        // getting a valid answer
        $answer = Media::select('media.name')
                    ->join('movies', 'media_id', '=', 'id')
                    ->whereIn('media_id', Media::select('media_id')
                                            ->join('media_platform', 'media_id', '=', 'id')
                                            ->where('platform_id', $platforms[0]['id'])
                            )
                    ->inRandomOrder()
                    ->first();

        $answer = $answer ? $answer->name : 'Nenhuma das opções';

        // getting options
        $options = Media::select('name')
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
