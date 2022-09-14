<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

//cadastro
Route::middleware('auth:api')->group(function () {
    Route::post('login',[formController::class,'userlogin']);;});
Route::post('/form',    [formController::class,'store'  ]);
Route::get('/show/{id}',     [formController::class,'show'   ]);
Route::put('/edit/{id}',     [formController::class,'edit']);
Route::delete('/delete/{id}',[formController::class,'delete']);



