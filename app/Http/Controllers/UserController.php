<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\FortifyServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role','=','AdmAluno')->orderBy('name')->get();
        return view('alunos.index', compact('users'));
    }
    public function create()
    {
        $userId = Auth::user()->id;
        return view('alunos.create',compact('userId'));
    }
    public function store(Request $request)
    {
        $criador = new CreateNewUser();

        $usuario = $criador->create($request->all());
        $usuario->role = 'AdmAluno';
        $usuario->save();
        if (!$usuario){
            return response()->json(["error" => "Could not create a User"]);
        }else{

            return redirect()->route('alunos.index');
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

        return view('alunos.show',compact('user'));
    }
    public function remove(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('alunos.index');


    }

}
