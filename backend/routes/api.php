<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;

// User
Route::post('/user', [UserController::class, 'create']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::get('/ranking', [UserController::class, 'ranking']);

// Platform
Route::post('/platform', [PlatformController::class, 'create']);
Route::get('/platform', [PlatformController::class, 'index']);
Route::get('/platform/{id}', [PlatformController::class, 'show']);
Route::put('/platform/{id}', [PlatformController::class, 'update']);
Route::delete('/platform/{id}', [PlatformController::class, 'delete']);

// Genre
Route::post('/genre', [GenreController::class, 'create']);
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::put('/genre/{id}', [GenreController::class, 'update']);
Route::delete('/genre/{id}', [GenreController::class, 'delete']);

// Director
Route::post('/director', [DirectorController::class, 'create']);
Route::get('/director', [DirectorController::class, 'index']);
Route::get('/director/{id}', [DirectorController::class, 'show']);
Route::put('/director/{id}', [DirectorController::class, 'update']);
Route::delete('/director/{id}', [DirectorController::class, 'delete']);

// Actor
Route::post('/actor', [ActorController::class, 'create']);
Route::get('/actor', [ActorController::class, 'index']);
Route::get('/actor/{id}', [ActorController::class, 'show']);
Route::put('/actor/{id}', [ActorController::class, 'update']);
Route::delete('/actor/{id}', [ActorController::class, 'delete']);

// Media
Route::post('/media', [MediaController::class, 'create']);
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'show']);
Route::put('/media/{id}', [MediaController::class, 'update']);
Route::delete('/media/{id}', [MediaController::class, 'delete']);

// Country
Route::post('/country', [CountryController::class, 'create']);
Route::get('/country', [CountryController::class, 'index']);
Route::get('/country/{id}', [CountryController::class, 'show']);
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'delete']);

// Movie
Route::post('/movie', [MovieController::class, 'create']);
Route::get('/movie', [MovieController::class, 'index']);
Route::get('/movie/{media_id}', [MovieController::class, 'show']);
Route::put('/movie/{media_id}', [MovieController::class, 'update']);
Route::delete('/movie/{media_id}', [MovieController::class, 'delete']);

// Series
Route::post('/series', [SeriesController::class, 'create']);
Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/{media_id}', [SeriesController::class, 'show']);
Route::put('/series/{media_id}', [SeriesController::class, 'update']);
Route::delete('/series/{media_id}', [SeriesController::class, 'delete']);

// Many to many relationships
Route::post('/media/genre', [MediaController::class, 'createRelationshipWithGenre']);
Route::post('/media/director', [MediaController::class, 'createRelationshipWithDirector']);
Route::post('/media/actor', [MediaController::class, 'createRelationshipWithActor']);
Route::post('/media/platform', [MediaController::class, 'createRelationshipWithPlatform']);

// Questions
Route::get('/question/releaseYear', [MediaController::class, 'getReleaseYearQuestion']);
Route::get('/question/twoPlatforms', [MediaController::class, 'getTwoPlatformsQuestion']);
Route::get('/question/notAMovie', [MediaController::class, 'getNotAMovieQuestion']);
Route::get('/question/movieByPlatform', [MediaController::class, 'getMovieByPlatform']);

Route::get('/question/numberOfSeasons', [SeriesController::class, 'getNumberOfSeasonsQuestion']);

// To Do
Route::get('/question/movieByGenreAndActor', [MediaController::class, 'getMovieByGenreAndActor']);
Route::get('/question/oldestMedia', [MediaController::class, 'getOldestMedia']);

Route::get('/question/directorWithMoreMediasByGenre', [DirectorController::class, 'getDirectorWithMoreMediasByGenre']);
Route::get('/question/directorAndActor', [DirectorController::class, 'getDirectorAndActor']);
Route::get('/question/directorWithMoreMovies', [DirectorController::class, 'getDirectorWithMoreMovies']);

Route::get('/question/platformWithMoreMedias', [PlatformController::class, 'getPlatformWithMoreMedias']);

Route::get('/question/seriesWithMoreSeasons', [SeriesController::class, 'getSeriesWithMoreSeasons']);


