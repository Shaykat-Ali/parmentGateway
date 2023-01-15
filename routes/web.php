<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\PartnerUserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);

Route::resource('partners', PartnerController::class);
Route::get('partners/change-status/{partner_id}', [PartnerController::class,'changeStatus'])->name('partner.status.change');

Route::resource('partner-users', PartnerUserController::class);
Route::get('partner-user/{partner_id:partner_id}', [PartnerUserController::class,'create'])->name('partner.user.create');

