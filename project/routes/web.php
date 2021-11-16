<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\GabunganController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
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
        Route::get('/add', [BiodataController::class, 'add']);
    });
    // route view
    Route::get('/', [BiodataController::class, 'index']);
    Route::post('/', [BiodataController::class, 'store']);
});

Route::prefix('/kamar')->group(function () {
    Route::prefix('/view')->group(function () {
        Route::get('/add', [KamarController::class, 'add']);
    });
    // route view
    Route::get('/', [KamarController::class, 'index']);
    Route::post('/', [KamarController::class, 'store']);
});

Route::prefix('/kategori')->group(function () {
    Route::prefix('/view')->group(function () {
        Route::get('/add', [KategoriController::class, 'add']);
    });
    // route view
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
});

Route::prefix('/gabungan')->group(function () {
    Route::prefix('/view')->group(function () {
        Route::get('/add', [GabunganController::class, 'add']);
    });
    // route view
    Route::get('/', [GabunganController::class, 'index']);
    Route::post('/', [GabunganController::class, 'store']);
});

Route::prefix('/user')->group(function () {
    Route::prefix('/view')->group(function () {
        Route::get('/add', [UserController::class, 'add']);
    });
    // route view
    Route::get('/', [UserController::class, 'index']);
});