<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index()
    {
        
        return Food::all();
    }
    public function show(int $id)
    {
        $food = Food::find($id);
        if (!$food){
            return response()->json(['error' => 'Food not found'],404);
        }
        return response()->json(['food'=>$food],200);
    }
    public function showCategory(string $category)
    {
        $foods =  DB::table('foods')->where('category','=', $category)->get();
        if(count($foods) <= 0){
            return response()->json(['error' => 'Something went wrong'],404);
        }
        return response()->json(['foods'=>$foods],200);
    }

}
