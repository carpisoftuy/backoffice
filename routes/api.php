<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenesController;

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

Route::get('almacenes', [AlmacenesController::class, 'GetAlmacenes']);
Route::post('almacenes', [AlmacenesController::class, 'CreateAlmacen']);
Route::put('almacenes/{id}', [AlmacenesController::class, 'UpdateAlmacen']);
Route::delete('almacenes/{id}', [AlmacenesController::class, 'DeleteAlmacen']);