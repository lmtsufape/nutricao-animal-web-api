<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user,201);
    }
    public function update(User $user,Request $request)
    {
        $user->fill($request->all());
        $user->save();
        return $user;
    }
    public function show(int $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(["error" => "User not found"],404);
        }
        return $user;
    }

}
