<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\RfqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Auth::routes();

Route::group(['prefix' => 'option', 'as' => 'option.'], function () {
    Route::get('brand', [\App\Http\Controllers\OptionController::class, 'brand'])->name('brand');
    Route::get('unit', [\App\Http\Controllers\OptionController::class, 'unit'])->name('unit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', \App\Http\Controllers\UserController::class)->middleware(['role:Administrator']);

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::resource('merek', \App\Http\Controllers\BrandController::class);
        Route::resource('jenis', \App\Http\Controllers\UnitController::class);
        Route::resource('produk', \App\Http\Controllers\ProductController::class);
    });

    Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
        Route::resource('merek', \App\Http\Controllers\BrandController::class);
        Route::resource('jenis', \App\Http\Controllers\UnitController::class);
        Route::resource('produk', \App\Http\Controllers\ProductController::class);
        Route::resource('rfq', \App\Http\Controllers\RfqController::class);
    });

    Route::get('/load-component/{component}', [RfqController::class, 'show']);
    Route::get('/project/show', [RfqController::class, 'detail'])->name('rfq.form');;

});
