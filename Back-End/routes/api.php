<?php

use App\Http\Controllers\ElectricCarController;
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

//Get Single car
Route::get('/electric-cars/{electric_car}', [ElectricCarController::class, 'show']);

//Store/Make a new car to the db
Route::post('/electric-cars', [ElectricCarController::class, 'store']);

//Update data in the database for electric cars
Route::patch('/electric-cars/{electric_car}', [ElectricCarController::class, 'update']);

//Delete the car
Route::delete('/electric-cars/{electric_car}', [ElectricCarController::class, 'destroy']);
