<?php

use App\Http\Controllers\AdminUsersCreateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/users', function () {
//    return Inertia::render('Table');
//})->middleware(['auth', 'verified'])->name('table');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('/users', [\App\Http\Controllers\OwnersController::class,'create'])->name('users');
    Route::get('/agents', [\App\Http\Controllers\AgentController::class,'create'])->name('agents');
    Route::get('/apartments', [\App\Http\Controllers\ApartmentController::class,'create'])->name('apartments');

    Route::post('/users/create', [AdminUsersCreateController::class, 'createUser'])->name('user.create');
    Route::get('/users/create', [AdminUsersCreateController::class,'create'])->name('user.create.form');

    Route::get('/agents/create', [\App\Http\Controllers\AdminAgentCreateController::class,'create'])->name('agent.create.form');
    Route::post('/agents/create', [\App\Http\Controllers\AdminAgentCreateController::class, 'createAgent'])->name('agent.create');

    Route::get('/user/{id}', [\App\Http\Controllers\UsersController::class, 'show'])->name('user');

    Route::patch('/user/update/{id}', [AdminUsersCreateController::class, 'updateUser'])->name('user.update');
});

Route::middleware(['auth','role:owner'])->group(function (){

});

Route::middleware(['auth','role:agent'])->group(function (){

});

require __DIR__.'/auth.php';
