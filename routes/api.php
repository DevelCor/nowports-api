<?php

use App\Http\Controllers\GoodsByLetterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MercanciasController;
use App\Models\GoodsByLetter;

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

Route::prefix( '/goodsbyletter' )->group( function () {
    Route::post( '/create', [GoodsByLetterController::class, 'store'] );
    Route::get( '/', [GoodsByLetterController::class, 'index'] );
    Route::get( '/{letter_id}', [GoodsByLetterController::class, 'show'] );
    Route::put( '/{letter_id}', [GoodsByLetterController::class, 'update'] );
    Route::delete( '/{letter_id}', [GoodsByLetterController::class, 'destroy'] );
} );
//Auth Group
Route::prefix( '/user' )->group( function () {
    Route::get('/login', [UsersController::class,'login']);
    Route::post('/register', [UsersController::class,'create']);
});
