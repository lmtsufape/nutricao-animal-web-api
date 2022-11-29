<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index(int $id)
    {
        $user = User::find($id);
        $animals = $user->animals()->get();
        
        return response()->json(['animal'=>$animals],200);
    }
    public function store(Request $request)
    {
        $user = User::find($request->userId);
        $animal = $user->animals()->create($request->except(['userId']));
        if(!$animal){
            return response()->json(['error' => "Could not create a Animal"],404);
        }

        $animal->menu()->create();
        return response()->json(['animal'=>$animal],201);
    }
    public function show(Request $request)
    {
        $animal = Animal::find($request->animal);
        if(!$animal){
            return response()->json(['error' => "Animal not found"],404);
        }
        return response()->json(['animal'=>$animal],200);
    }
    public function update(Request $request)
    {
        $animal = Animal::find($request->animal);
        $animal->fill($request->all());
        $animal->save();
        return response()->json([$animal],200);
    }
    public function destroy(Request $request)
    {
        $animal = Animal::find($request->animal);
        $animal->users()->detach();
        $animal->delete();
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
        if(!$bio){
            return response()->json(['error' => "Could not create a Animal"],404);
        }
        $breed = DB::table('breeds')->where('name','=', $request->breed,'and','user_id','=', $user->id)->first();
        if(!$breed){
            return response()->json(['error' => "Could not create a Animal, Breed does not exist"],404);
        }

        $animal->breed = $breed;
        $breed = Breed::find($breed->id);
       
        return response()->json(['animal' => $animal,'biometry' =>$animal->biometry,'breed'=>$animal->breed],201);
    }

}
