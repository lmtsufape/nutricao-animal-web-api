<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalStoreRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;
use App\Models\UserAnimal;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index(int $id)
    {
        $user = User::find($id);
        $animals = $user->animals()->get();
        $animal = Animal::join("breeds", "animals.breed_id", "=", "breeds.id")->
        join("biometries","animals.id","=","biometries.animal_id")->get();
        
        return response()->json(['animals'=>$animal],200);
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
        DB::beginTransaction();
        $animal = Animal::find($request->animal);
        $animal->users()->detach();
        $animal->delete();
        DB::commit();
        return response()->noContent();

    }
    public function animalComplete(AnimalStoreRequest $request)
    {
        DB::beginTransaction();
        $user = User::find($request->userId);
        $animal = $user->animals()->create($request->animal);
       
        $animal->menu()->create();
        $bio = $animal->biometry()->create($request->biometry);
        $breed = DB::table('breeds')->where('name','=', $request->breed)->first();
    
        if(!$animal || !$bio || !$breed){
            return response()->json(['error' => "Could not create a Animal"],406);
        }
        $animal->breed_id = $breed->id;
        $animal->save();
       
        $animal->breed = $breed;
        DB::commit();
        return response()->json(['animal' => $animal],201);
    }

}
