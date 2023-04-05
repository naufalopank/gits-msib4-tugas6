<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
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

Route::middleware(['auth:web'])->group(function () {
    // kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy']);
    
    // produk
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('/produk/create', [ProdukController::class, 'create']);
    Route::post('/produk/store', [ProdukController::class, 'store']);
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
    Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy']);
    
    // cart
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('/cart/add/{id}', [CartController::class, 'store']);
    Route::put('/cart/update/{id}', [CartController::class, 'update']);
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy']);
});

//auth
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::post('/register', [AuthController::class, "doRegister"])->name('do.register');
Route::post('/login', [AuthController::class, "doLogin"])->name('do.login');