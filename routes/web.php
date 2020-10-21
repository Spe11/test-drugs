<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DrugController;
use App\Http\Controllers\Admin\SubstanceController;
use App\Http\Controllers\SiteController;
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

Route::prefix('admin')->group(function () {
    Route::resource('/substances', SubstanceController::class);
    Route::resource('/drugs', DrugController::class);
    Route::get('/', AdminController::class);
});

Route::get('/', [SiteController::class, 'index']);
Route::post('/search', [SiteController::class, 'search']);
