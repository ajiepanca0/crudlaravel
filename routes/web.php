<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pegawai', [EmployeeController::class,'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::class,'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class,'insertdata'])->name('insertdata');
Route::get('/tampildata/{id}', [EmployeeController::class,'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [EmployeeController::class,'updatedata'])->name('updatedata');
Route::get('/deletedata/{id}', [EmployeeController::class,'deletedata'])->name('deletedata');

//export PDF
Route::get('/exportpdf', [EmployeeController::class,'exportpdf'])->name('exportpdf');

