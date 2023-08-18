<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjetController;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
    Route::get('/register', 'register')->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::prefix('/projet')->controller(ProjetController::class)->group(function () {
        Route::get('/index', 'index')->name('projet.index');
    });
    Route::prefix('/commentaire')->controller(CommentaireController::class)->group(function () {
        Route::get('/create', 'create')->name('commentaire.create');
        Route::post('/store', 'store')->name('commentaire.store');
        Route::get('/index', 'index')->name('commentaire.index');
        Route::get('/edit/{id}', 'edit')->name('commentaire.edit');
        Route::put('/update/{id}', 'update')->name('commentaire.update');
        Route::delete('/delete/{id}', 'destroy')->name('commentaire.destroy');
    });
    Route::prefix('/phase')->controller(PhaseController::class)->group(function () {
        Route::get('/index', 'index')->name('phase.index');
    });
});

Route::middleware(['auth', 'user-role:admin'])->group(function () {

    Route::prefix('/employe')->controller(EmployeController::class)->group(function () {
        Route::get('/create', 'create')->name('employe.create');
        Route::post('/store', 'store')->name('employe.store');
        Route::get('/index', 'index')->name('employe.index');
        Route::get('/edit/{matriculation}', 'edit')->name('employe.edit');
        Route::put('/update/{matriculation}', 'update')->name('employe.update');
        Route::delete('/delete/{matriculation}', 'destroy')->name('employe.destroy');
    });


    Route::prefix('/projet')->controller(ProjetController::class)->group(function () {
        Route::get('/create', 'create')->name('projet.create');
        Route::post('/store', 'store')->name('projet.store');
        Route::get('/edit/{reference}', 'edit')->name('projet.edit');
        Route::put('/update/{reference}', 'update')->name('projet.update');
        Route::delete('/delete/{reference}', 'destroy')->name('projet.destroy');
    });
    Route::prefix('/phase')->controller(PhaseController::class)->group(function () {
        Route::get('/create', 'create')->name('phase.create');
        Route::post('/store', 'store')->name('phase.store');
        Route::get('/edit/{id}', 'edit')->name('phase.edit');
        Route::put('/update/{id}', 'update')->name('phase.update');
        Route::delete('/delete/{id}', 'destroy')->name('phase.destroy');
    });
});
