<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;

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

Route::get('/alltodos',[TodoController::class,'index'])->name('todos');
Route::post('/alltodos',[TodoController::class,'store']);
Route::delete('/alltodos/{todo}',[TodoController::class,'destroy'])->name('deleteTodo');
Route::post('/alltodos/{todo}/update',[TodoController::class,'update'])->name('updateTodo');

Route::post('/alltodos/{todo}/complete',[TodoController::class,'complete'])->name('complete');

Route::get('/',function(){
    return view('home');
})->name('home');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name("login");
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);