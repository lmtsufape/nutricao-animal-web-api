<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class ComidaController extends Controller
{
    public function index()
    {
        $user = User::find($id);
        return $user->foods()->get();
    }
    public function store(Request $request)
    {
        $user = User::find($request->userId);
        $food = $user->foods()->create($request->except(['userId']));
        return response()->json($food,201);
    }
    public function show(int $id)
    {
        $food = Food::find($id);
        if (!$food){
            return response()->json(['error' => 'Food not found'],404);
        }
        return $food;
    }
    public function update(Request $request,Food $food)
    {
        $food->fill($request->all());
        $food->save();
        return $food;
    }
    public function destroy(Food $food,int $id)
    {
        $food->destroy($id);
    }

}
