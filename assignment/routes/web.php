<?php

use Illuminate\Support\Facades\Auth; // Add this line

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ItemsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/chart', function () {
    return view('chart');
})->middleware('auth');

Route::get('/chart-data', [ChartController::class, 'index'])->middleware('auth');

Route::get('/items', function () {
    return view('items');
})->middleware('auth');

Route::resource('items', ItemsController::class)->middleware('auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
