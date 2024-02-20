<?php

use App\Http\Controllers\AdminUsersCreateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('/owners', [AdminUsersCreateController::class,'ShowUsers'])->name('owners');
    Route::get('/agents', [AdminUsersCreateController::class,'ShowAgents'])->name('agents');
    Route::get('/apartments', [AdminUsersCreateController::class,'ShowApartments'])->name('apartments');
});

//Route::get('/owners', [AdminUsersCreateController::class,'ShowUsers'])->name('owners');

