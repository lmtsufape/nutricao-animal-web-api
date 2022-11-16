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
        $usuario->role = "Tutor";
        if (!$usuario){
            return response()->json(["error" => "Could not create a User"]);
        }else{

            return response()->json(['usuario' => $usuario, 'função'=> $usuario->role],201);
        }
    }
    public function update(Request $request)
    {
        $user = User::find($request->user);
        $user->fill($request->all());
        $user->save();
        return response()->json(['usuario' => $user],200);
    }
    public function show(Request $request)
    {
        $user = User::find($request->user);
        if(!$user){
            return response()->json(["error" => "User not found"],404);
        }
        return response()->json(['usuario' => $user],200);
    }
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->destroy($id);
        return response()->noContent();
    }

    public function token(Request $request)
    {

        $token = $request->user()->currentAccessToken();

         return response()->json(['token'=>$token->plainTextToken],200);
    }

}
