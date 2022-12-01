<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Breed;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreedController extends Controller
{
    public function index()
    {
        return Breed::all();
    }

    public function show(Request $request)
    {
        $breed = Breed::find($request->breed);
        if(!$breed){
            return response()->json(['error' => "Breed not found"],404);
        }
        return response()->json(['breed' => $breed],200);
    }
    public function showSpecies(String $specie)
    {

        $breeds =  DB::table('breeds')->where('species', $specie)->get();
        return response()->json(['breeds' => $breeds],200);
    }
}
