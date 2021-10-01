<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\APIReceptorController;
use App\Http\Controllers\receptionMailController;
use App\Http\Controllers\DemandeAndEchantillonController;

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

Route::get('/',[Controller::class,'home'])->name('home');

/********************Recetion ROUTING******************/
Route::get('/reception',[ReceptionController::class,'reception'])->name('reception');
Route::get('/modification',[ReceptionController::class,'modification'])->name('modification');



/********************Receptor API ROUTING******************/
Route::get('/register',[APIReceptorController::class,'registerReceptor'])->name('registerReceptor');
Route::get('/login',[APIReceptorController::class,'login'])->name('login');
Route::get('/isLoggedIn',[APIReceptorController::class,'isLoggedIn'])->name('isLoggedIn');
Route::get('/logout',[APIReceptorController::class,'logout'])->name('logout');
Route::get('/bar',[receptionMailController::class,'bar'])->name('bar');


/********************************Demande API ROUTE**************** */
Route::get('/demande',[DemandeAndEchantillonController::class,'addDemand'])->name('addDemand');
Route::get('/deleteDemande',[DemandeAndEchantillonController::class,'deleteDemande'])->name('deleteDemande');
Route::get('/echantillons',[DemandeAndEchantillonController::class,'addEchantillon'])->name('addEchantillon');
