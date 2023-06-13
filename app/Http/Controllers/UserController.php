<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function getUsers()
    {

        $user = User::all();
        $filteredUsers = UserResource::collection($user);
        
        //if  wrong id provided
        // if ($filteredUsers) {
        //     return response()->json(['msg' =>"no users found"], 404);
        // }

        // return new UserResource($user);
        // return $user; 
        return response()->json($filteredUsers,200);
    }
    public function getUser($id)
    {
        $user = User::findorFail($id);
          

        //if  no user in db
        if (!$user) {
            return response()->json(['msg' => `No user with {$id}`], 404);
        }

        // return new UserResource($user);
        return response()->json($user,200);
    }

    // create user

    public function createUser(Request $request)
{
    $dataCheck = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Create the user using the validated data
    $createduser = User::create($dataCheck);

    $data = response()->json($createduser, 201);
    if(! $data){
        return response()->json(['msg' => 'error occured'], 404);
    }
    return response()->json($createduser, 201);
}
}
