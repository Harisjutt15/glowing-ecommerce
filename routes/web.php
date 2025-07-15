<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('home.index');
});


Route::group(['prefix'=> 'admin','as'=> 'admin.'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');



    Route::group(['prefix'=> 'product','as'=> 'product.'], function () {
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::get('/encrpt',[ProductController::class,'encrpt'])->name('encrpt');
    });

    Route::group(['prefix'=> 'category','as'=> 'category.'], function () {
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/categort-delete/{id}',[CategoryController::class,'delete'])->name('delete');
        Route::get('/delete-Image/{id}',[CategoryController::class,'deleteImage'])->name('deleteImage');
        Route::get('/download-Image/{id}',[CategoryController::class,'download'])->name('download');
    });
});

Route::group(['prefix'=>'home','as'=>'home.'],function(){

    Route::get('/',[HomeController::class,'index'])->name('index');
});

