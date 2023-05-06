<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BreedStoreRequest;
use App\Models\Breed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Breed::query()
        ->orderBy('species')
        ->get();
        return view('breeds.index', compact('breeds'));
    }
    public function create()
    {
        $userId = Auth::user()->id;
        return view('breeds.create',compact('userId'));
    }

    public function store(BreedStoreRequest $request)
    {
        $user = $request->user();
        $breed = $user->breeds()->create([
            'name' => $request->name,
            'type'=> $request->type,
            'species'=> $request->species
       ]);


        return redirect()->route('breeds.index');
    }
    public function show(int $id)
    {
        $breed = Breed::find($id);
        return view('breeds.show',compact('breed'));
    }
    public function edit(int $id)
    {

        $breed = Breed::find($id);

        return view('breeds.edit',compact('breed'));
    }

    public function update(BreedStoreRequest $request)
    {
        $breed =  Breed::find($request->id);
        $breed->update($request->all());
        $breed->save();
        return view('breeds.show',compact('breed'));
    }

    public function remove(int $id)
    {
        $breed =  Breed::find($id);
        $breed->delete();
        return redirect()->route('breeds.index');
    }
}
