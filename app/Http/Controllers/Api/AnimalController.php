<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;

class AnimalController extends Controller
{
    public function index(int $id)
    {
        $user = User::find($id);
        return $user->animals()->get();
    }
    public function store(Request $request)
    {
        $user = User::find($request->userId);
        $animal = $user->animals()->create($request->except(['userId']));
        if(!$animal){
            return response()->json(['error' => "Could not create a Animal"],404);
        }

        $animal->menu()->create();
        return response()->json($animal,201);
    }
    public function show(int $id)
    {
        $animal = Animal::query()->find($id);
        if(!$animal){
            return response()->json(['error' => "Animal not found"],404);
        }
        return $animal;
    }
    public function update(Request $request,Animal $animal)
    {
        $animal->fill($request->all());
        $animal->save();
        return $animal;
    }
    public function destroy(int $id)
    {
        Animal::destroy($id);
        return response()->noContent();
    }
    public function animalComplete(Request $request)
    {
        $user = User::find($request->userId);
        $animal = $user->animals()->create($request->animal);
        if(!$animal){
            return response()->json(['error' => "Could not create a Animal"],404);
        }
        $animal->menu()->create();
        $bio = $animal->biometry()->create($request->biometry);

        dd($animal,$bio);
        dd($request->animal);
    }

}
