<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepositAccountController;
use App\Http\Controllers\TicketAccountController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TransferAccountController;
use App\Http\Controllers\WithdrawAccountController;

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
    Route::post('/account/created', [AccountController::class,'created']);
});

Route::post('/form',    [formController::class,'store', ]);
Route::get('/show',     [formController::class,'show'   ]);
Route::get('/show/{id}', [formController::class, 'getUser']);
Route::put('/edit/{id}',     [formController::class,'edit']);
Route::delete('/delete/{id}',[formController::class,'delete']);

//CONTA
Route::post('/account/index', [AccountController::class,'index']);

//Transfer
Route::post('/transfer',[TransferAccountController::class,'transfer']);

//SAQUE
Route::post('/withdraw', [WithdrawAccountController::class,'Withdraw']);

//DEPOSITO
Route::post('/deposit',[DepositAccountController::class,'deposit']);

//BOLETO
Route::post('/ticket',[TicketAccountController::class,'Ticket']);
