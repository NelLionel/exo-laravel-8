<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\http\Controllers\ContactController;
use App\http\Controllers\InscriptionController;
use App\http\Controllers\MailController;
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

Route::controller(ArticleController::class)->group(function (){

    Route::get('/blog','index');
    Route::get('/detailsblog/{idblog}', 'show');
    Route::get('/blog/{idblog}/update', 'showupdate');
    Route::get('blog/store', 'showstore');
    
    Route::post('/blog/store', 'store');
    Route::patch('/blog/{idblog}', 'update');
    Route::post('/blog/addcomment/{idblog}', 'addcomment');
    Route::delete('/blog/{idblog}', 'delete');
    
    });
    

Route::controller(ContactController::class)->group(function(){

    Route::get('/contact', 'showcontact');
    Route::get('/lescontacts', 'contactlist');
    Route::get('/details/{idcontact}', 'dedailcontact');


    Route::post('/blog/contact', 'addcontact');
    Route::delete('/lescontacts/{idc}', 'deletecontact');
});



Route::controller(InscriptionController::class)->group(function(){

    Route::get('/inscription', 'InscriptionHome');
    Route::get('/connexion', 'Connexionhome');
    Route::get('/profilhome', 'profil');
    Route::get('/deconnexion', 'deconnexion');
    
    Route::post('/profil/login', 'login');
    Route::post('/inscription/saveinscription', 'inscription');
});

Route::controller(MailController::class)->group(function(){

    Route::get('/showcontact', 'showcontactmail');
});
    