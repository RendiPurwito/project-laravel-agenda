<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AgendaController;


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


// Login
Route::get('/', function () {
    return view('User.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postLogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Auth
Route::group(['middleware' => ['auth', 'checkrole:administrator']], function () {
    // Registration
    Route::get('/registration', [LoginController::class, 'register'])->name('registration');
    Route::post('/adminhome', [LoginController::class, 'saveregister'])->name('adminhome');

    // Route::post('/saveregistration', [LoginController::class, 'saveregister'])->name('saveregistration');

    // Home
    Route::get('/adminhome', [HomeController::class, 'adminhome'])->name('adminhome');
    

    // Mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::get('/adddatamapel',[MapelController::class, 'create'])->name('adddatamapel');
    Route::post('/insertdatamapel',[MapelController::class, 'store'])->name('insertdatamapel');
    Route::get('/formeditmapel/{id}',[MapelController::class, 'edit'])->name('formeditmapel');
    Route::put('/updatedatamapel/{id}',[MapelController::class, 'update'])->name('updatedatamapel');
    Route::get('/deletedatamapel/{id}',[MapelController::class, 'destroy'])->name('deletedatamapel');
    
    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/tambahdatakelas',[KelasController::class, 'create'])->name('tambahdatakelas');
    Route::post('/insertdatakelas',[KelasController::class, 'store'])->name('insertdatakelas');
    Route::get('/formeditkelas/{id}',[KelasController::class, 'edit'])->name('formeditkelas');
    Route::put('/updatedatakelas/{id}',[KelasController::class, 'update'])->name('updatedatakelas');
    Route::get('/deletedatakelas/{id}',[KelasController::class, 'destroy'])->name('deletedatakelas');

    // Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/tambahdataguru',[GuruController::class, 'create'])->name('tambahdataguru');
    Route::post('/insertdataguru',[GuruController::class, 'store'])->name('insertdataguru');
    Route::get('/formeditguru/{id}',[GuruController::class, 'edit'])->name('formeditguru');
    Route::put('/updatedataguru/{id}',[GuruController::class, 'update'])->name('updatedataguru');
    Route::get('/deletedataguru/{id}',[GuruController::class, 'destroy'])->name('deletedataguru');

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
    Route::get('/tambahdataagenda',[AgendaController::class, 'create'])->name('tambahdataagenda');
    Route::post('/insertdataagenda',[AgendaController::class, 'store'])->name('insertdataagenda');
    Route::get('/formeditagenda/{id}',[AgendaController::class, 'edit'])->name('formeditagenda');
    Route::put('/updatedataagenda/{id}',[AgendaController::class, 'update'])->name('updatedataagenda');
    Route::get('/deletedataagenda/{id}',[AgendaController::class, 'destroy'])->name('deletedataagenda');
});

Route::group(['middleware' => ['auth', 'checkrole:teacher']], function () {
    route::get('/home', [HomeController::class, 'index'])->name('home');
    route::post('/storehome', [HomeController::class, 'store'])->name('storehome');
});
