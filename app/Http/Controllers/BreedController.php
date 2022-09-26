<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreedController extends Controller
{
    public function index()
    {
        return Breed::all();
    }
    public function store(Request $request)
    {
        
        $user = User::find($request->userId);
        $breed = $user->breeds()->create($request->all());

        if (!$breed){
            return response()->json(["error" => "Could not create a Breed"],406);
        }else{
        return response()->json($breed,201);
        }
    }
    public function show(int $id)
    {
        $breed = Breed::find($id);
        if(!$breed){
            return response()->json(['error' => "Breed not found"],404);
        }
        return $breed;
        }
    public function destroy(Breed $breed,int $id)
    {
        $breed->destroy($id);
    }
    public function showSpecies(Request $request)
    {
        $breeds =  DB::table('breeds')->where('species', $request->species)->get();
        return $breeds;
    }
}
