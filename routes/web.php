<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientHandlingController;

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

Route::get('/C-N/{number}',[ClientHandlingController::class,'collerNumber']);
Route::post('/in-bound-store',[ClientHandlingController::class,'InboundDataSubmit'])->name('inbound.store');

Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('already_LoggedIn');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::post('/user-register',[AuthController::class,'userRegister'])->name('user-register');
Route::post('/user-login',[AuthController::class,'userLogin'])->name('user-login');
Route::get('/',[AuthController::class,'dashboard'])->middleware('is_loggedIn');
Route::get('/logout',[AuthController::class,'userLogout'])->name('user-logout')->middleware('is_loggedIn');
Route::get('/user-list',[AuthController::class,'userList'])->name('user-list')->middleware('is_loggedIn');
Route::get('/out-bound',[ClientHandlingController::class,'Outbound'])->name('outbound')->middleware('is_loggedIn');
Route::post('/out-bound-store',[ClientHandlingController::class,'OutboundDataSubmit'])->name('data.store')->middleware('is_loggedIn');
Route::get('/client-list',[ClientHandlingController::class,'clientList'])->name('client.list')->middleware('is_loggedIn');
Route::get('/search-client-list',[ClientHandlingController::class,'searchClientList'])->name('search.report')->middleware('is_loggedIn');



