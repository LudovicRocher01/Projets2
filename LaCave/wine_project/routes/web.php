<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WineController;
use App\Http\Controllers\ProducteurController;
use App\Http\Controllers\TypeController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('wines',WineController::class);
Route::resource('producteurs',ProducteurController::class);
Route::resource('type',TypeController::class);
require __DIR__.'/auth.php';
