<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\APIReceptorController;
use App\Http\Controllers\PreparationController;
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

/********************Recetion admin******************/
Route::match(['get', 'post'],'/admin',[adminController::class,'adminPage'])->name('adminPage');
Route::match(['get', 'post'],'/createEmploye',[adminController::class,'ajoutEmploye'])->name('store');

/********************Recetion ROUTING******************/
Route::get('/reception',[ReceptionController::class,'reception'])->name('reception');
Route::get('/modification',[ReceptionController::class,'modification'])->name('modification');
Route::get('/modification/{id}',[ReceptionController::class,'showDemande'])->name('showDemande');
// Route::match(['get', 'post'],'/reception/demande/echantillons',[ReceptionController::class,'echatillon'])->name('echantillon');
/********************services ROUTING******************/
Route::get('preparation/{name}',[PreparationController::class,'showPage'])->name('preparation');
Route::get('/AppLogin',[PreparationController::class,'loginPage'])->name('login');




/********************Receptor API ROUTING******************/
Route::get('/register',[APIReceptorController::class,'registerReceptor'])->name('registerReceptor');
Route::post('/connexion/{page}',[APIReceptorController::class,'login'])->name('login');
Route::get('/isLoggedIn',[APIReceptorController::class,'isLoggedIn'])->name('isLoggedIn');
Route::get('/logout',[APIReceptorController::class,'logout'])->name('logout');
Route::get('/bar',[receptionMailController::class,'bar'])->name('bar');


/********************************Demande API ROUTE**************** */
Route::post('/demande',[DemandeAndEchantillonController::class,'addDemand'])->name('addDemand');
Route::get('/demandeUpdate',[DemandeAndEchantillonController::class,'updateDemand'])->name('updateDemand');

Route::get('/deleteDemande',[DemandeAndEchantillonController::class,'deleteDemande'])->name('deleteDemande');
Route::post('/echantillons/{damande_path}',[DemandeAndEchantillonController::class,'addEchantillon'])->name('addEchantillon');
Route::get('/echantillonsUpdate',[DemandeAndEchantillonController::class,'updateEchantillon'])->name('updateEchantillon');

Route::get('/getDemande',[DemandeAndEchantillonController::class,'getDemande'])->name('getDemande');

