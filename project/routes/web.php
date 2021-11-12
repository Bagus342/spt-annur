<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

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
    return view('templates.template');
});

Route::prefix('/biodata')->group(function () {
    Route::prefix('/view')->group(function () {
        Route::add('/add', [BiodataController::class, 'add']);
    });
    // route view
    Route::get('/', [BiodataController::class, 'index']);
});
