<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\FortifyServiceProvider;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        $criador = new CreateNewUser();

        $usuario = $criador->create($request->toArray());
        if (!$usuario){
            return response()->json(["error" => "Não conseguiu cadastrar"]);
        }else{

            return response()->json($usuario,201);
        }
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
    public function token(Request $request)
    {
    
        $token = $request->user()->currentAccessToken();

         return response()->json($token->plainTextToken,200);
    }

}
