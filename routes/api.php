<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\BiometryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BreedController;
use App\Http\Controllers\Api\ConsumptionRecordController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\SnackController;

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

    Route::apiResource('/users',UserController::class)->except('store');

    Route::apiResource('users/{userId}/animals',AnimalController::class)->except('store');
    Route::post('users/{userId}/animals/complete',[AnimalController::class,'animalComplete']);
   

    Route::apiResource('users/{userId}/animals/{animalId}/biometry',BiometryController::class);

    Route::apiResource('users/{userId}/breed',BreedController::class)->only('index','show');
    Route::get('users/breed/{specie}',[BreedController::class,'showSpecies']);

    Route::apiResource('users/{userId}/animals/{animalId}/menu', MenuController::class);
    Route::apiResource('users/{userId}/animals/{animalId}/menu/snack', SnackController::class);

    Route::apiResource('users/{userId}/animals/{animalId}/record',ConsumptionRecordController::class);

    Route::apiResource('foods',FoodController::class)->only('index','show');
    Route::get('foods/category/{category}',[FoodController::class,'showCategory']);
 });


Route::post('/users',[UserController::class,'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('image/{id}',[AnimalController::class,'getImage']);

