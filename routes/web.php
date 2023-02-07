<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home')->name('home');
});
Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'admin'
])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/alunos','index')->name('alunos.index');
        Route::get('/alunos/criar', 'create')->name('alunos.create');
        Route::post('/alunos/criar', 'store');
        Route::get('/alunos/{id}', 'show')->name('alunos.show');
        Route::get('/alunos/{id}/editar', 'edit')->name('alunos.edit');
        Route::post('/alunos/{id}/editar', 'update')->name('alunos.update');
        Route::delete('/alunos/{id}', 'remove')->name('alunos.remove');
    });
    Route::controller(FoodController::class)->group(function () {
        Route::get('/alimentos', 'index')->name('foods.index');
        Route::get('/alimentos/criar', 'create')->name('foods.create');
        Route::post('/alimentos/criar', 'store');
        Route::get('/alimentos/{id}', 'show')->name('foods.show');
        Route::get('/alimentos/{id}/editar', 'edit')->name('foods.edit');
        Route::post('/alimentos/{id}/editar', 'update')->name('foods.update');
        Route::delete('/alimentos/{id}', 'remove')->name('foods.remove');
    });
    Route::controller(BreedController::class)->group(function () {
        Route::get('/racas', 'index')->name('breeds.index');
        Route::get('/racas/criar', 'create')->name('breeds.create');
        Route::post('/racas/criar', 'store');
        Route::get('/racas/{id}', 'show')->name('breeds.show');
        Route::get('/racas/{id}/editar', 'edit')->name('breeds.edit');
        Route::post('/racas/{id}/editar', 'update')->name('breeds.update');
        Route::delete('/racas/{id}', 'remove')->name('breeds.remove');
    });

});
