<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalStoreRequest;
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
    public function store(AnimalStoreRequest $request)
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
        $user = $animal->users()->get();
        $breed = DB::table('breeds')->where('user_id','=', $user[0]->id)->first();
        
        $biometry=$animal->biometry;
        return response()->json(['animal'=>$animal,'breed'=> $breed,'biometry'=>$biometry],200);
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
    public function animalComplete(AnimalStoreRequest $request)
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
        $breed = DB::table('breeds')->where('name','=', $request->breed)->first();
        if(!$breed){
            return response()->json(['error' => "Could not create a Animal, Breed does not exist"],404);
        }
        $breed = Breed::find($breed->id);
        $breed->user_id = $user->id;
        $breed->save();
        
        return response()->json(['animal' => $animal,'biometry' =>$animal->biometry,'breed'=>$breed],201);
    }

}
