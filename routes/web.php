<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ComandeController;
use App\Http\Controllers\DetailController;


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


Route::get('/',[ProductController::class,'index']);

Route::resource('products',ProductController::class);
Route::get('/products/categorie/{parametre}',[ProductController::class,'categorie'])->name('products.categorie');
Route::get('/session/store',[SessionController::class,'store'])->name('sessions.store');

Route::get('/session/delete',[SessionController::class,'delete'])->name('sessions.delete');

Route::get('/session/diminuer/{parametre}',[SessionController::class,'diminuer'])->name('sessions.diminuer');

Route::get('/session/edit/{parametre}',[SessionController::class,'edit'])->name('sessions.edit');
Route::get('/session/update/{parametre}',[SessionController::class,'update'])->name('sessions.update');
Route::resource('commandes',ComandeController::class);
Route::get('/card',function(){
    return view('demande.card');
})->name('demande.card');

Route::get('/session/edit',function(){
    return view('demande.edit');
})->name('demande.edit');

Route::get('/details/enregistrer/{parametre}',[DetailController::class,'enregistrer'])->name('details.enregistrer');

Auth::routes();

Route::get('data',[DetailController::class,'getNombreDeProduitParCategorie'])->name('data');

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
