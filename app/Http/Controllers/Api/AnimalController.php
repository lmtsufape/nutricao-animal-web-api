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
    public function index($id)
    {
        $animals = UserAnimal::where("user_animals.user_id","=",$id)->
        join("animals","user_animals.animal_id","=","animals.id")->
        join("breeds", "animals.breed_id", "=", "breeds.id")->
        join("biometries","animals.id","=","biometries.animal_id")->
        select(DB::raw("animals.id as id"),"animals.name","animals.image",
        "animals.sex","animals.activity_level","animals.is_castrated","animals.birthDate",
        DB::raw("breeds.name as breed"),"weight","height")->
        get();
        
        return response()->json(['animals'=>$animals],200);
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
        $animal = $user->animals()->create([
            'name' =>$request->name,'sex'=>$request->sex,
            'is_castrated'=>boolval($request->is_castrated),
            'activity_level'=>$request->activity_level,
            'image'=>base64_encode($request->file('image')),
        ]);

        $user->save();
        $animal->menu()->create();
        $bio = $animal->biometry()->create(['weight'=>$request->weight,'height'=>$request->height]);
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
    public function getImage(Request $request)
    {
        $animal = Animal::find($request->animalId);
        $imagem =base64_decode($animal->image);
        return response()->json(['imagem' => $imagem],201);
    }

}
