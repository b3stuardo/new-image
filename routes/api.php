<?php

use App\Http\Controllers\DireccionController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\tipoProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('direccion')->group( function(){
    Route::get('index',[DireccionController::class,'index']);
    Route::post('store',[DireccionController::class,'store']);
    Route::put('update/{id}',[DireccionController::class,'update']);
    Route::delete('destroy/{id}',[DireccionController::class, 'destroy']);
});
Route::prefix('tipoproducto')->group( function(){
    Route::get('index',[tipoProductoController::class,'index']);
    Route::post('store',[tipoProductoController::class,'store']);
    Route::put('update/{id}',[tipoProductoController::class,'update']);
    Route::delete('destroy/{id}',[tipoProductoController::class, 'destroy']);
});
Route::prefix('horario')->group( function(){
    Route::get('index',[HorarioController::class,'index']);
    Route::post('store',[HorarioController::class,'store']);
    Route::put('update/{id}',[HorarioController::class,'update']);
    Route::delete('destroy/{id}',[HorarioController::class, 'destroy']);
});
Route::prefix('estado')->group( function(){
    Route::get('index',[EstadoController::class,'index']);
    Route::post('store',[EstadoController::class,'store']);
    Route::put('update/{id}',[EstadoController::class,'update']);
    Route::delete('destroy/{id}',[EstadoController::class, 'destroy']);
});
Route::prefix('oferta')->group( function(){
    Route::get('index',[OfertaController::class,'index']);
    Route::post('store',[OfertaController::class,'store']);
    Route::put('update/{id}',[OfertaController::class,'update']);
    Route::delete('destroy/{id}',[OfertaController::class, 'destroy']);
});
Route::prefix('producto')->group( function(){
    Route::get('index',[ProductoController::class,'index']);
    Route::post('store',[ProductoController::class,'store']);
    Route::put('update/{id}',[ProductoController::class,'update']);
    Route::delete('destroy/{id}',[ProductoController::class, 'destroy']);
});