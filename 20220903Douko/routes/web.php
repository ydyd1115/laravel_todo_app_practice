<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/',[TodoController::class, 'index'])->middleware('auth');
Route::post('/add',[TodoController::class, 'create']);
Route::post('/update',[TodoController::class, 'update']);
Route::post('/delete',[TodoController::class, 'delete']);
Route::get('/logout', [LoginController::class,'loggedOut']);



Route::get('/search',[TodoController::class, 'search']);
Route::post('/search',[TodoController::class, 'result']);

