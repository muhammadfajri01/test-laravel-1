<?php

use App\Http\Controllers\Controller;
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

Route::get('/', [App\Http\Controllers\homeController::class,'index']);

Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/login-process',[App\Http\Controllers\LoginController::class,'login_process'])->name('login-process');

Route::get('/register',[App\Http\Controllers\LoginController::class,'register'])->name('register');
Route::post('/register-process',[App\Http\Controllers\LoginController::class,'register_process'])->name('register-process');

Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['auth'],'as' => 'admin.'],function(){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/users',[App\Http\Controllers\DashboardController::class,'userview'])->name('user');
    Route::get('/dashboard/assets',[App\Http\Controllers\DashboardController::class,'assets'])->name('assets');
    Route::get('/dashboard/clientside',[App\Http\Controllers\DataTableController::class,'clientside'])->name('clientside');
    Route::get('/dashboard/serverside',[App\Http\Controllers\DataTableController::class,'serverside'])->name('serverside');

    Route::get('/dashboard/users/create',[App\Http\Controllers\DashboardController::class,'usercreate'])->name('user.create');
    Route::post('/dashboard/users/store',[App\Http\Controllers\DashboardController::class,'store'])->name('user.store');

    Route::get('/dashboard/users/detail/{id}',[App\Http\Controllers\DashboardController::class,'detail'])->name('user.detail');
    Route::get('/dashboard/users/edit/{id}',[App\Http\Controllers\DashboardController::class,'edit'])->name('user.edit');
    Route::put('/dashboard/users/update/{id}',[App\Http\Controllers\DashboardController::class,'update'])->name('user.update');

    Route::delete('/dashboard/users/delete/{id}',[App\Http\Controllers\DashboardController::class,'delete'])->name('user.delete');
});
