<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//    // return view('welcome');
//    echo "Hello AMU";
// }); 
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix'=>'admin','middleware'=>['auth'], 'as' => 'admin.'], function(){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // User table
    Route::get('/User',[HomeController::class,'index'])->name('index');
    Route::get('/Create',[HomeController::class,'create'])->name('user.create');
    Route::post('/Store',[HomeController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');
    
    // KAS table
    Route::get('kas/data-kas',[KasController::class,'index'])->name('kas.index');
    Route::get('kas/create-kas',[KasController::class,'create'])->name('kas.create');
    Route::post('kas/store-kas',[KasController::class,'store'])->name('kas.store');
    Route::get('kas/kas-edit/{id}',[KasController::class,'edit'])->name('kas.edit');
    Route::put('kas/kas-update/{id}',[KasController::class,'update'])->name('kas.update');
    Route::delete('kas/kas-delete/{id}',[KasController::class,'delete'])->name('kas.delete');
    
    //Kegiatan
    Route::get('kegiatan/data-kegiatan', [KegiatanController::class,'index'])->name('kegiatan.index');
    Route::get('kegiatan/create-kegiatan',[kegiatanController::class,'create'])->name('kegiatan.create');
    Route::post('kegiatan/store-kegiatan',[kegiatanController::class,'store'])->name('kegiatan.store');
    Route::get('kegiatan/kegiatan-edit/{id}',[kegiatanController::class,'edit'])->name('kegiatan.edit');
    Route::put('kegiatan/kegiatan-update/{id}',[kegiatanController::class,'update'])->name('kegiatan.update');
    Route::delete('kegiatan/kegiatan-delete/{id}',[kegiatanController::class,'delete'])->name('kegiatan.delete');
    
    });
    // Route::group(['prefix'=>'kas'], function(){
    // Route::get('/data-kas',[KasController::class,'index'])->name('kas.index');
    //   });