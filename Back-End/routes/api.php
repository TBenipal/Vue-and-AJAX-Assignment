<?php

use App\Http\Controllers\ElectricCarController;
use App\Http\Controllers\PetrolCarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

# /api
Route::get('/', function () {
    return json_encode(['hello' => 'world']);
});

// ::class prints the FQCN, which is App\Http\Controllers\BookController

//Show all electric cars
//127.0.0.1:8000/api/electric-cars
Route::get('/electric-cars', [ElectricCarController::class, 'index']);

//Show all petrol cars
//127.0.0.1:8000/api/petrol-cars
Route::get('/petrol-cars', [PetrolCarController::class, 'index']);

//Get Single electric car
Route::get('/electric-cars/{electric_car}', [ElectricCarController::class, 'show']);

//Get Single petrol car
Route::get('/petrol-cars/{petrol_car}', [PetrolCarController::class, 'show']);

//Store/Make a new electric car to the db
Route::post('/electric-cars', [ElectricCarController::class, 'store']);

//Store/Make a new petrol car to the db
Route::post('/petrol-cars', [PetrolCarController::class, 'store']);

//Update data in the database for electric cars
Route::patch('/electric-cars/{electric_car}', [ElectricCarController::class, 'update']);

//Update data in the database for petrol cars
Route::patch('/petrol-cars/{petrol_car}', [PetrolCarController::class, 'update']);

//Delete the electric car
Route::delete('/electric-cars/{electric_car}', [ElectricCarController::class, 'destroy']);

//Delete the electric car
Route::delete('/petrol-cars/{petrol_car}', [PetrolCarController::class, 'destroy']);
