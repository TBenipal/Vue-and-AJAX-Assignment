<?php

use App\Http\Controllers\BookController;
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
Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{book}', [BookController::class, 'show']);

//INDEX: List
//SHOW: Single resource
//STORE: Create a new resource
//UPDATE: Updating a resource
//DESTROY: deleting/destroying a resource

Route::post('/books', [BookController::class, 'store']);

//PUT: the entire object must be provided, meaning any missing fields are updated to null
//PATCH: change whatever fields are provided, and leave the rest alone!

//PATCH is most used

Route::patch('/books/{book}', [BookController::class, 'update']);

Route::delete('/books/{book}', [BookController::class, 'destroy']);
