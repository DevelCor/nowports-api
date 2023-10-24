<?php

use App\Http\Controllers\GoodsByLetterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MercanciasController;
use App\Models\GoodsByLetter;
use App\Http\Controllers\InstructionCardsController;

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

Route::prefix( '/mercancias' )->group( function () {
    Route::post( '/create', [MercanciasController::class, 'store'] );
    Route::get( '/', [MercanciasController::class, 'index'] );
    Route::get( '/{mercancia_id}', [MercanciasController::class, 'show'] );
    Route::put( '/{mercancia_id}', [MercanciasController::class, 'update'] );
    Route::delete( '/{mercancia_id}', [MercanciasController::class, 'destroy'] );
} );

//goodsbyletter
Route::prefix( '/goods-by-letter' )->group( function () {
    Route::post( '/create', [GoodsByLetterController::class, 'store'] );
    Route::get( '/', [GoodsByLetterController::class, 'index'] );
    Route::get( '/{id}', [GoodsByLetterController::class, 'show'] );
    Route::put( '/{id}', [GoodsByLetterController::class, 'update'] );
    Route::delete( '/{id}', [GoodsByLetterController::class, 'destroy'] );
} );

//Auth Group
Route::prefix( '/user' )->group( function () {
    Route::post('/login', [UsersController::class,'login']);
    Route::post('/register', [UsersController::class,'create']);
    Route::get('/find', [UsersController::class,'index']);
});


//instruction cards
Route::prefix( '/instruction-cards' )->group( function () {
    Route::post( '/create', [InstructionCardsController::class, 'store'] );
    Route::get( '/', [InstructionCardsController::class, 'index'] );
    Route::get( '/{id}', [InstructionCardsController::class, 'show'] );
    Route::put( '/{id}', [InstructionCardsController::class, 'update'] );
    Route::delete( '/{id}', [InstructionCardsController::class, 'destroy'] );
} );
