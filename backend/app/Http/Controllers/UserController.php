<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request){
    	$user = new User;

    	$user->username = $request->username;
    	$user->save();

    	return response()->json($user);
    }

    public function index(){
    	$users = User::all();

    	return response()->json($users);
    }

    public function show($id){
    	$user = User::findOrFail($id);

    	return response()->json($user);
    }

    public function update(Request $request, $id){
    	$user = User::find($id);

        if ($user) {
            if ($request->username)
                $user->username = $request->username;

            if ($request->score)
                $user->score = $request->score;

            $user->save();
            return response()->json($user);
        } else {
            return response()->json(['Este usuario nao existe']);
        }
    }

    public function delete($id){
    	User::destroy($id);

    	return response()->json(['Usuario deletado com sucesso']);
    }

    public function ranking(){
    	$users = User::orderByDesc('score')
                ->limit(5)
                ->get();

    	return response()->json($users);
    }
}
