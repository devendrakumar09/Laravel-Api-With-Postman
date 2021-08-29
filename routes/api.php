<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestApiController;

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
//GET API With Array Return in JSON formate
Route::get('/testArray',[TestApiController::class,'testArray']);

//Get Api return Data From Database
Route::get('/students',[TestApiController::class,'students']);

//Get Api With Params return Data From Database
Route::get('/student/{id?}',[TestApiController::class,'student']);


//post Api call
Route::post('/student/add',[TestApiController::class,'addStudent']);

//PUT Api call
Route::put('/student/update',[TestApiController::class,'updateStudent']);

//DELETE Api call
Route::delete('/student/delete',[TestApiController::class,'deleteStudent']);
