<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate'); 
    Route::get('/dashboard', 'dashboard')->name('dashboard'); 
    Route::post('/logout', 'logout')->name('logout'); 
    Route::post('/store', 'store')->name('store');
    Route::get('/register', 'register')->name('register');
});
    
Route::get('/createEmploye',[EmployeController::class, 'create'])->name('employe.create');
Route::post('/storeEmploye',[EmployeController::class, 'storeEmploye'])->name('employe.storeEmploye');
Route::get('/employeIndex',[EmployeController::class, 'index'])->name('employe.index');
Route::get('/editEmploye/{matriculation}',[EmployeController::class, 'edit'])->name('employe.edit');
Route::put('/updateEmplote/{matriculation}',[EmployeController::class, 'update'])->name('employe.update');
