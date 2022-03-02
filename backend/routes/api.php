<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\ShowController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

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

// Gender
Route::post('/gender', [GenderController::class, 'create']);
Route::get('/gender', [GenderController::class, 'index']);
Route::get('/gender/{id}', [GenderController::class, 'show']);
Route::put('/gender/{id}', [GenderController::class, 'update']);
Route::delete('/gender/{id}', [GenderController::class, 'delete']);

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

// Show
Route::post('/show', [ShowController::class, 'create']);
Route::get('/show', [ShowController::class, 'index']);
Route::get('/show/{id}', [ShowController::class, 'show']);
Route::put('/show/{id}', [ShowController::class, 'update']);
Route::delete('/show/{id}', [ShowController::class, 'delete']);
