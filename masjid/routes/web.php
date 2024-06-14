<?php

use App\Http\Controllers\HomeController;
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
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

// User table
Route::get('/User',[HomeController::class,'index'])->name('index');
Route::get('/Create',[HomeController::class,'create'])->name('user.create');
Route::post('/Store',[HomeController::class,'store'])->name('user.store');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');