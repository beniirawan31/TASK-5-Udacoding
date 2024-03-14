<?php

use App\Http\Controllers\sesiController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\matkulController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web RoutesA
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

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/dosen', [dosenController::class, 'index'])->name('dosen.index');

Route::resource('matkul', matkulController::class);




// //login
Route::get('/sesi', [sesiController::class, 'index']);

Route::get('/register', [sesiController::class, 'register2']);

Route::post('/register', [sesiController::class, 'register'])->name('session.register');

Route::post('/login', [sesiController::class, 'login'])->name('login');


Route::get('/sesi/login', [sesiController::class, 'login'])->name('sesi.login');

Route::post('/sesi/create', [sesiController::class, 'create'])->name('sesi.create');


Route::GET('/sesi/register', [sesiController::class, 'register'])->name('sesi.register');
Route::post('/sesi/register', [sesiController::class, 'register'])->name('sesi.register.post');




// Route::get('/register', 'Session\RegisterController@showRegistrationForm')->name('session.register');

Route::get('/logout', [sesiController::class, 'logout']);
