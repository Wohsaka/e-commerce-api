<?php

use App\Http\Controllers\ShoppingHistoryController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

// Public routes

Route::get('/history', [ShoppingHistoryController::class, 'index']);
Route::get('/history/{email}', [ShoppingHistoryController::class, 'show']);
Route::post('/history', [ShoppingHistoryController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
