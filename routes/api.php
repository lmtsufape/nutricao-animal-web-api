<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\BiometryController;

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BreedController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::apiResource('/users',UserController::class);
    Route::apiResource('/users',UserController::class)->except('store');

    Route::apiResource('users/{userId}/animals',AnimalController::class);
    Route::apiResource('users/{userId}/animals/{animalId}/biometry',BiometryController::class);
    Route::get('users/{userId}/breed/specie',[BreedController::class,'showSpecies']);
 });

Route::apiResource('users/{userId}/breed',BreedController::class);
Route::post('/users',[UserController::class,'store']);
Route::post('/login', [LoginController::class, 'login']);

