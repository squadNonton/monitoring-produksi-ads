<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MainController::class, 'dasbor'])->name('dasbor');
Route::get('dasbor', [MainController::class, 'dasbor'])->name('dasbor');
Route::get('produksi', [MainController::class, 'produksi'])->name('produksi');
Route::get('scheduleprod', [MainController::class, 'scheduleprod'])->name('scheduleprod');
Route::post('dataprodpcs', [MainController::class, 'dataprodpcs'])->name('dataprodpcs');
Route::post('dataprodkg', [MainController::class, 'dataprodkg'])->name('dataprodkg');
Route::post('dataeffmachine', [MainController::class, 'dataeffmachine'])->name('dataeffmachine');
Route::post('dataactmanpower', [MainController::class, 'dataactmanpower'])->name('dataactmanpower');
Route::post('actionlistdata', [MainController::class, 'actionlistdata'])->name('actionlistdata');

Route::post('actionshowdata', [MainController::class, 'actionshowdata'])->name('actionshowdata');
Route::post('actionshowdatawmulti', [MainController::class, 'actionshowdatawmulti'])->name('actionshowdatawmulti');
Route::post('actionedit', [MainController::class, 'actionedit'])->name('actionedit');
Route::post('actioneditwmulti', [MainController::class, 'actioneditwmulti'])->name('actioneditwmulti');
Route::post('actiondelete', [MainController::class, 'actiondelete'])->name('actiondelete');

Route::post('actioncheckmanpower', [MainController::class, 'actioncheckmanpower'])->name('actioncheckmanpower');
Route::post('actioncheckeff', [MainController::class, 'actioncheckeff'])->name('actioncheckeff');
Route::post('actionadd', [MainController::class, 'actionadd'])->name('actionadd');
Route::get('listdataschedule', [MainController::class, 'listdataschedule'])->name('listdataschedule');
Route::get('listdataout', [MainController::class, 'listdataout'])->name('listdataout');
Route::get('listeffisiensi', [MainController::class, 'listeffisiensi'])->name('listeffisiensi');
Route::get('listmanpower', [MainController::class, 'listmanpower'])->name('listmanpower');
Route::post('machinebytglin', [MainController::class, 'machinebytglin'])->name('machinebytglin');
Route::post('countvalidasi', [MainController::class, 'countvalidasi'])->name('countvalidasi');
Route::post('dataquartal', [MainController::class, 'dataquartal'])->name('dataquartal');

// Produksi
Route::get('prodin', [MainController::class, 'prodin'])->name('prodin');
Route::get('prodout', [MainController::class, 'prodout'])->name('prodout');
Route::get('effmachine', [MainController::class, 'effmachine'])->name('effmachine');
Route::get('actmanpower', [MainController::class, 'actmanpower'])->name('actmanpower');

//Action Chart
Route::get('ppicschedule', [MainController::class, 'ppicschedule'])->name('ppicschedule');
Route::get('prodoutput', [MainController::class, 'prodoutput'])->name('prodoutput');
Route::get('prodefisiensi', [MainController::class, 'prodefisiensi'])->name('prodefisiensi');
Route::get('prodmanpower', [MainController::class, 'prodmanpower'])->name('prodmanpower');
Route::get('masterbaseprice', [MainController::class, 'masterbaseprice'])->name('masterbaseprice');


// Tess Data
Route::get('tesmain', [MainController::class, 'tesmain'])->name('tesmain');
