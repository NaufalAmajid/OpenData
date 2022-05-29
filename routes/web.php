<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SektoralController;
use App\Http\Controllers\OrganisasiController;

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
});

Route::get('/test', function () {
    return view('mainPage');
});

// ADMIN PAGES ROUTES =======================================================================================================================

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//ROUTE FOR AUTHENTICATION
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('processLogin')->middleware('guest');
    Route::post('/logout', 'userLogout')->name('logout')->middleware('auth');
});

//ROUTE FOR DATASET
Route::controller(DatasetController::class)->group(function(){
    Route::get('/dataset/data', 'index')->name('dataset')->middleware('auth');
    Route::get('/dataset/tags', 'indexTags')->name('tags')->middleware('auth');
});

//ROUTE FOR SEKTORAL
Route::controller(SektoralController::class)->group(function () {
    Route::get('/sektoral', 'index')->name('sektoral')->middleware('auth');
});

//ROUTE FOR ORGANISASI
Route::controller(OrganisasiController::class)->group(function () {
    Route::get('/organisasi', 'index')->name('organisasi')->middleware('auth');
});

// END ADMIN PAGES ROUTES =======================================================================================================================
