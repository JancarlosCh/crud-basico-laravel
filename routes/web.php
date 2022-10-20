<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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
    return view('welcome');
})->middleware('guest');

Route::get('home', function () {
    return view('welcome');
})->middleware('guest')->name('home');



Route::middleware(['guest'])->group(function () {
    Route::get('auth/register', [RegisterController::class, 'index'])->name('auth.register.index');
    Route::post('auth/register', [RegisterController::class, 'store'])->name('auth.register.store');
});

Route::middleware(['guest'])->group(function () {
    Route::get('auth', function () {
        return view('auth.login');
    });
    Route::get('auth/login', [SessionController::class, 'index'])->name('auth.login.index');
    Route::post('auth/login', [SessionController::class, 'login'])->name('auth.session.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', function() {
        return view('admin.index')->with('name', auth()->user()->name);
    });
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/products', ProductController::class);
    Route::get('auth/logout', [SessionController::class, 'logout'])->name('auth.session.logout');
});
