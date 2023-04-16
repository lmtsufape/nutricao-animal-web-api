<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Menu;
use App\Models\MenuSnack;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = MenuSnack::where('menu_snacks.menu_id', '=', $request->animalId)
        ->join('snacks', 'snacks.id', '=', 'menu_snacks.snack_id')
        ->join('foods', 'foods.id', '=', 'food_id')->select('name', 'amount', 'category', 'snack_id')
        ->get();
        if(!$menu){
            return response()->json(['error' => "Menu not found"],404);
        }
        return response()->json(['menu' => $menu],200);
    }

    public function store(Request $request)
    {
        $animal = Animal::find($request->animalId);
        $menu = $animal->menu()->create($request->all());

        if (!$menu){
            return response()->json(["error" => "Could not create a Menu"],406);
        }
        return response()->json(['menu' => $menu],201);
    }

    public function show(Request $request)
    {
        $menu = Menu::find($request->animalId);
        if(!$menu){
            return response()->json(['error' => "Menu not found"],404);
        }
        return response()->json(['menu '=> $menu],200);
    }

    public function destroy(Menu $menu,int $id)
    {
        $menu->destroy($id);
        return response()->noContent();
    }
}
