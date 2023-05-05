<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodStoreRequest;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::query()
        ->orderBy('name')
        ->get();
        return view('foods.index', compact('foods'));
    }
    public function create()
    {
        $userId = Auth::user()->id;
        return view('foods.create',compact('userId'));
    }

    public function store(FoodStoreRequest $request)
    {
        $user = $request->user();
        $food = $user->foods()->create($request->all());

        return redirect()->route('foods.index');
    }
    public function show(int $id)
    {
        $food = Food::find($id);

        return view('foods.show',compact('food'));
    }

    public function remove(int $id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('foods.index');
    }
    public function edit(int $id)
    {

        $food = Food::find($id);

        return view('foods.edit',compact('food'));
    }
    public function update(Request $request,int $id)
    {
        $food = Food::find($id);
        $food->update($request->all());
        $food->save();
        return redirect()->route('foods.index');
    }

}
