<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\ConsumptionRecord;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumptionRecordController extends Controller
{
    public function index()
    {
        return ConsumptionRecord::all();
    }
    public function store(Request $request)
    {
        
        
        $animal = Animal::find($request->animalId);
        $record = $animal->records()->create([
            'amount' => $request->amount, 'date' => $request->date, 'hour' => $request->hour,
            'food_id' => 1
            ]);
        if (!$record){
            return response()->json(["error" => "Could not create a record"],406);
        }
        return response()->json($record,201);
    }
    public function show(int $id)
    {
        $record = ConsumptionRecord::find($id);
        if(!$record){
            return response()->json(['error' => "record not found"],404);
        }
        return $record;
        }
    public function destroy(ConsumptionRecord $record,int $id)
    {
        $record->destroy($id);
    }
    
}
