<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController2;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ComandeController;
use App\Http\Controllers\Command_api_controller;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:api'])->group(function () {    
    Route::post('user_info',[PassportAuthController::class,'userInfo']);
});
Route::post('register',[PassportAuthController::class,'register']);

Route::post('login',[PassportAuthController::class,'login']);

Route::get('categories',[CategorieController::class,'categorie']);
Route::post('update/categories/{id}',[CategorieController::class,'Update']);

Route::resource('products',ProductController2::class);

Route::post("Update/{id}",[ProductController2::class,'Update']);
Route::get("statistique",[ProductController2::class,'getStatistique']);

Route::resource('categorie',CategorieController::class);

Route::get('products/get_porducts_categorie/{id}',[ProductController2::class,'get_porducts_categorie']);

Route::get('/get_image/{id}',[ProductController2::class,'display_image']);

Route::get('commandes',[Command_api_controller::class,'getCommandes']);

Route::delete('delete/commandes/{id}',[Command_api_controller::class,'deleteCommand']);

Route::post('update/commandes/{id}',[Command_api_controller::class,'UpdateCommand']);

Route::get('details/{id}',[DetailController::class,'getDetails']);

Route::get('chiffre_afaire',[DetailController::class,'getNombreDeProduitParCategorie']);

Route::get('user/{id}',[UserController::class,'getUser']);

