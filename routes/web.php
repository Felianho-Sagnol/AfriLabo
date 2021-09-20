<?php

use Illuminate\Support\Facades\Route;

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
    return view('Accueil');
});
<<<<<<< HEAD

Route::get('/Reception',function(){ return view('Reception/Reception'); });
=======
>>>>>>> 8667687600988d25c2c68b70b3ac6378b7b44d6c
