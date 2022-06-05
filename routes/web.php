<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DesigController;

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



Route::get('/',[FormController::class,'getForm']);

Route::post('addFormData',[FormController::class,'addData']);

Route::get('showData',[FormController::class,'showData']);

Route::get('editData/{id}',[FormController::class,'editData']);

Route::post('editFormData',[FormController::class,'editFormData']);

Route::get('delData/{id}',[FormController::class,'delData']);

Route::get('showrel/{id}',[FormController::class,'showRelation']);

Route::resource('designation',DesigController::class);
