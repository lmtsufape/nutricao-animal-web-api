<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function store(Request $request)
    {

        $animal = Animal::find($request->animalId);
        $menu = $animal->menu()->create($request->all());

        if (!$menu){
            return response()->json(["error" => "Could not create a Menu"],406);
        }else{
            return response()->json($menu,201);
        }
    }
    public function show(int $id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return response()->json(['error' => "menu not found"],404);
        }
        return $menu;
        }
    public function destroy(Menu $menu,int $id)
    {
        $menu->destroy($id);
        return response()->noContent();
    }

}
