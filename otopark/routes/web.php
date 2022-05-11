<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\ImageUploadController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('/')->middleware('isUser')->group(function (){
Route::get('home',[HomeController::class,"home"])->name('home');
Route::get('empty',[HomeController::class,"empty"])->name('empty');
Route::get('details/{id}',[HomeController::class,"details"])->name('details');
Route::post('detailspost',[HomeController::class,"detailspost"])->name('detailspost');
Route::get('full',[HomeController::class,"full"])->name('full');
Route::get('settings/{id}',[HomeController::class,"settings"])->name('settings');
Route::post('settingspost/{id}',[HomeController::class,"settingspost"])->name('settingspost');
Route::get('update',[LoginController::class,"update"])->name('update');
Route::post('updatepost',[LoginController::class,"updatepost"])->name('updatepost');
Route::get('dropzone',[ImageUploadController::class,"dropzone"])->name('dropzone');
Route::post('store',[ImageUploadController::class,"store"]);
Route::get('exit',[LoginController::class,"exit"])->name('exit');
});

Route::prefix('/')->middleware('isLogout')->group(function (){
Route::get('login',[LoginController::class,"login"])->name('login');
Route::post('loginpost',[LoginController::class,"loginpost"])->name('loginpost');
Route::get('register',[LoginController::class,"register"])->name('register');
Route::post('registerpost',[LoginController::class,"registerpost"])->name('registerpost');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

Route::prefix('/')->middleware('isAdmin')->group(function (){
Route::get('dashboard',[AdminController::class,"dashboard"])->name('dashboard');
Route::get('welcome',[AdminController::class,"welcome"])->name('welcome');
Route::get('emptyadmin',[AdminController::class,"emptyadmin"])->name('emptyadmin');
Route::get('fulladmin',[AdminController::class,"fulladmin"])->name('fulladmin');
Route::get('settingsadmin/{id}',[AdminController::class,"settingsadmin"])->name('settingsadmin');
Route::post('settingspostadmin/{id}',[AdminController::class,"settingspostadmin"])->name('settingspostadmin');
Route::get('table',[AdminController::class,"table"])->name('table');
Route::get('edit/{id}',[AdminController::class,"edit"])->name('edit');
Route::post('editpost/{id}',[AdminController::class,"editpost"])->name('editpost');
Route::get('user',[AdminController::class,"user"])->name('user');
Route::get('useredit/{id}',[AdminController::class,"useredit"])->name('useredit');
Route::post('usereditpost/{id}',[AdminController::class,"usereditpost"])->name('usereditpost');
Route::get('profil',[AdminController::class,"profil"])->name('profil');
Route::post('profilpost',[AdminController::class,"profilpost"])->name('profilpost');
Route::get('delete/{id}',[AdminController::class,"delete"])->name('delete');
});
