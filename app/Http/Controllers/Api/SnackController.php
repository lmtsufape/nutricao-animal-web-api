<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SnackController extends Controller
{
    public function index()
    {
        return Snack::all();
    }
    public function store(Request $request)
    {
        
        $menu = DB::table('menus')->where('animal_id', '=', $request->animalId)->first();
        $food = DB::table('foods')->where('category','=',$request->category)->first();
        if(!$menu || !$food){
            return response()->json(['error' => "Could not create a Snack"],406);
        }
        $food =  Food::find($food->id);
        $menu =  Menu::find($menu->id);
        $snack = $food->snacks()->create(['amount' => $request->amount]);
        if(!$snack){
            return response()->json(['error' => "Snack not found"],404);
        }
        $menu->snacks()->save($snack);
        $menu->refresh();
        
        return response()->json(['snack'=>$snack,'menu'=>$menu->snacks],201);
    }
    public function show(Request $request)
    {
        
        $snacks = Snack::find($request->snack);
        if(!$snacks){
            return response()->json(['error' => "Snack not found"],404);
        }
        return response()->json(['snack'=>$snacks,'food'=>$snacks->food],200);
    }
    public function update(Request $request)
    {

        $snack = Snack::find($request->snack);
        $snack->fill($request->all());
        $snack->save();
        return response()->json(['snack' => $snack],200);
    }
    
    public function destroy(Request $request)
    {
        $snack = Snack::find($request->snack);
        $snack->menus()->detach();
        $snack->delete();
        return response()->noContent();
    }
}
