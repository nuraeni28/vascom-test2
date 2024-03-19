<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login-session', [AuthController::class, 'gate'])->name('login.gate');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/Jadwal-kegiatan', [HomeController::class, 'jadwalKegiatan'])->name('jadwal.index');
// Route::get('/Informasi-kegiatan', [HomeController::class, 'informasiKegiatan'])->name('informasi.index');
// Route::get('/Contact', [HomeController::class, 'contactKegiatan'])->name('contact.index');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout-user', [AuthController::class, 'logoutUser'])->name('logoutUser');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function (){ 
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::get('/users', [AdminController::class, 'user'])->name('user');
            Route::post('/users', [AdminController::class, 'createUser'])->name('user.create');
            Route::patch('/users/{id}', [AdminController::class, 'editUser'])->name('user.edit');
            Route::patch('/users/{id}/verify', [AdminController::class, 'verifyUser'])->name('user.verify');
            Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');

            Route::get('/produk', [AdminController::class, 'produk'])->name('produk');
            Route::post('/produk', [AdminController::class, 'createProduk'])->name('produk.create');
            Route::patch('/produk/{id}', [AdminController::class, 'editProduk'])->name('produk.edit');
            Route::delete('/produk/{id}', [AdminController::class, 'deleteProduk'])->name('produk.delete');
            Route::patch('/prosuk/{id}/verify', [AdminController::class, 'verifyProduk'])->name('produk.verify');
            
        });
    });
});
