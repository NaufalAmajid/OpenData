<?php

use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SektoralController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\TagsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// USER PAGES ROUTE =========================================================================================================================
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/user/dataset', 'dataset')->name('user.dataset');
    Route::post('/user/dataset/list', 'datasetList')->name('user.datasetList');
    Route::get('/user/dataset/detail/{kodeDataset}', 'detailDataset')->name('user.datasetDetail');
    Route::post('/user/dataset/extra/', 'extraDataset')->name('user.datasetExtra');
    Route::get('/user/dataset/file/{id}', 'detailFileDataset')->name('user.datasetDetailFile');
    Route::get('/user/organisasi', 'organisasi')->name('user.organisasi');
    route::post('/user/organisasi/list', 'organisasiList')->name('user.organisasiList');
    route::get('/user/organisasi/detail/{kodeOrganisasi}', 'detailOrganisasi')->name('user.organisasiDetail');
    Route::get('/user/sektoral', 'sektoral')->name('user.sektoral');
    route::post('/user/sektoral/list', 'sektoralList')->name('user.sektoralList');
    route::get('/user/sektoral/detail/{id}', 'detailSektoral')->name('user.sektoralDetail');
    Route::get('/user/tentang', 'tentang')->name('user.tentang');
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
    Route::get('/dataset/tableDataset', 'showDataDataset')->name('showDataDataset')->middleware('auth');
    Route::get('/dataset/detailDataset/{id}', 'detailDataset')->name('detailDataset')->middleware('auth');
    Route::post('/dataset/data', 'store')->name('createDataset')->middleware('auth');
    Route::post('/dataset/data/editFile', 'editFileDataset')->name('editFileDataset')->middleware('auth');
    Route::post('/dataset/data/addLinkFile', 'addLinkFile')->name('addLink')->middleware('auth');
    Route::post('/dataset/data/deleteDataset', 'deleteDataset')->name('deleteDataset')->middleware('auth');
    Route::post('/dataset/data/addNewFileDataset', 'addNewFileDataset')->name('addNewFileDataset')->middleware('auth');
    Route::post('/dataset/data/editInformationDataset', 'editInformationDataset')->name('editInformationDataset')->middleware('auth');
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
    Route::get('/sektoral/detailSektoral/{kodeSektor}', 'detailSektoral')->name('detailSektoral')->middleware('auth');
    Route::get('/sektoral/tableSektoral', 'showDataSektoral')->name('tableSektoral')->middleware('auth');
    Route::post('/sektoral', 'store')->name('addSektoral')->middleware('auth');
    Route::post('/sektoral/updateSektoral', 'update')->name('updateSektoral')->middleware('auth');
});

//ROUTE FOR ORGANISASI
Route::controller(OrganisasiController::class)->group(function () {
    Route::get('/organisasi', 'index')->name('organisasi')->middleware('auth');
    Route::post('/organisasi', 'store')->name('addOrganisasi')->middleware('auth');
});

//ROUTE FOR ADMINISTRATOR
Route::controller(AdministratorController::class)->group(function () {
    Route::get('/administrator/users', 'indexUsers')->name('users')->middleware('is_admin');
    Route::get('/administrator/dataset', 'admDataset')->name('admDataset')->middleware('is_admin');
    Route::get('/administrator/tableDataAdmin', 'showDataAdmin')->name('tableDataAdmin')->middleware('is_admin');
    Route::get('/administrator/tableDataOrganisasi', 'showDataOrganisasi')->name('tableDataOrganisasi')->middleware('is_admin');
    Route::get('/administrator/tableDataTags', 'showDataTags')->name('tableDataTags')->middleware('is_admin');
    Route::get('/administrator/tableDataSektoral', 'showDataSektoral')->name('tableDataSektoral')->middleware('is_admin');
    Route::get('/administrator/tableDataset', 'showDataset')->name('tableDataset')->middleware('is_admin');
    Route::post('/administrator/addNewAdmin', 'storeNewAdmin')->name('addNewAdmin')->middleware('is_admin');
    Route::post('/administrator/acceptDataset', 'publishDataset')->name('acceptDataset')->middleware('is_admin');
    Route::post('/administrator/acceptTag', 'acceptTag')->name('acceptTag')->middleware('is_admin');
    Route::post('/administrator/editTagName', 'editTagName')->name('editTag')->middleware('auth');
    Route::post('/administrator/checkBeforeDeleteTag', 'checkBeforeDeleteTag')->name('checkBfrDelTag')->middleware('is_admin');
    Route::post('/administrator/deleteTag', 'deleteTag')->name('delTag')->middleware('is_admin');
    Route::post('/administrator/acceptSektoral', 'acceptSektoral')->name('acceptSektoral')->middleware('is_admin');
    Route::post('/administrator/checkSektoral', 'checkSektoralBeforeDelete')->name('chckSektoralBfrDelete')->middleware('is_admin');
    Route::post('/administrator/deleteSektoral', 'deleteSektoral')->name('delSektoral')->middleware('is_admin');
    Route::get('/administrator/detailAdmin/{id}', 'detailAdmin')->name('detailAdmin')->middleware('is_admin');
    Route::post('/administrator/editAdmin', 'editAdmin')->name('editAdmin')->middleware('is_admin');
    Route::get('/administrator/detailOrganisasi/{id}', 'detailOrganisasi')->name('detailOrganisasi')->middleware('is_admin');
    Route::post('/administrator/checkOrganisasiBeforeDelete', 'checkOrganisasiBeforeDelete')->name('chkOrganisasi')->middleware('is_admin');
    Route::post('/administrator/deleteOrganisasi', 'deleteOrganisasi')->name('delOrganisasi')->middleware('is_admin');
    Route::post('/administrator/updateOrganisasi', 'updateOrganisasi')->name('updateOrganisasi')->middleware('is_admin');
    Route::get('/administrator/detailDataset/{id}', 'detailDataset')->name('detailDatasetAdm')->middleware('is_admin');
});

// END ADMIN PAGES ROUTES =======================================================================================================================
