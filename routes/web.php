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


Route::get('/', [MainController::class, 'scheduleprod'])->name('scheduleprod');
Route::get('scheduleprod', [MainController::class, 'scheduleprod'])->name('scheduleprod');
Route::post('dataprodpcs', [MainController::class, 'dataprodpcs'])->name('dataprodpcs');
Route::post('dataprodkg', [MainController::class, 'dataprodkg'])->name('dataprodkg');

Route::post('actionadd', [MainController::class, 'actionadd'])->name('actionadd');




// Tess Data
Route::get('tesmain', [MainController::class, 'tesmain'])->name('tesmain');
