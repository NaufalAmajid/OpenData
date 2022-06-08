<?php

use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SektoralController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\TagsController;

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
    Route::post('/dataset/data', 'store')->name('createDataset')->middleware('auth');
});

// ROUTES FOR TAGS
Route::controller(TagsController::class)->group(function(){
    Route::get('/dataset/tags', 'index')->name('tags')->middleware('auth');
    Route::post('/dataset/tags', 'store')->name('addTags')->middleware('auth');
    Route::get('/dataset/readTags', 'read')->name('readTags')->middleware('auth');
});

//ROUTE FOR SEKTORAL
Route::controller(SektoralController::class)->group(function () {
    Route::get('/sektoral', 'index')->name('sektoral')->middleware('auth');
    Route::post('/sektoral', 'store')->name('addSektoral')->middleware('auth');
});

//ROUTE FOR ORGANISASI
Route::controller(OrganisasiController::class)->group(function () {
    Route::get('/organisasi', 'index')->name('organisasi')->middleware('auth');
    Route::post('/organisasi', 'store')->name('addOrganisasi')->middleware('auth');
});

//ROUTE FOR ADMINISTRATOR
Route::controller(AdministratorController::class)->group(function () {
    Route::get('/administrator/users', 'indexUsers')->name('users')->middleware('auth')->middleware('is_admin');
    Route::get('/administrator/dataset', 'admDataset')->name('admDataset')->middleware('auth')->middleware('is_admin');
});

// END ADMIN PAGES ROUTES =======================================================================================================================
