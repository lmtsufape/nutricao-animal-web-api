<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Biometry;
use Illuminate\Http\Request;


class BiometryController extends Controller
{
    public function index()
    {
        return Biometry::all();
    }
    public function store(Request $request)
    {
        $animal = Animal::find($request->animalId);

        $biometry = $animal->biometry()->create($request->except(['animalId','userId']));
        if (!$biometry){
            return response()->json(["error" => "Could not create a Biometry"],406);
        }else{
        return response()->json($biometry,201);
        }
    }
    public function show(int $id)
    {
        $biometry = Biometry::find($id);

        return response()->json($biometry,201);
    }
    public function destroy(Biometry $breed,int $id)
    {
        $breed->destroy($id);
    }
}
