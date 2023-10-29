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


Route::post('actionadd', [MainController::class, 'actionadd'])->name('actionadd');

// Produksi
Route::get('prodin', [MainController::class, 'prodin'])->name('prodin');
Route::get('prodout', [MainController::class, 'prodout'])->name('prodout');
Route::get('effmachine', [MainController::class, 'effmachine'])->name('effmachine');
Route::get('actmanpower', [MainController::class, 'actmanpower'])->name('actmanpower');




// Tess Data
Route::get('tesmain', [MainController::class, 'tesmain'])->name('tesmain');
