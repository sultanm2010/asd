<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\BookController;

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
Route::get('index',[App\Http\controllers\BookController::class,'index'])->name('book.index');
Route::get('create',[App\Http\controllers\BookController::class,'create'])->name('book.create');
Route::post('store',[App\Http\controllers\BookController::class,'store'])->name('book.store');
Route::get('edit/{id}',[App\Http\controllers\BookController::class,'show'])->name('book.show');
Route::get('soft-delete/{id}',[App\Http\controllers\BookController::class,'softDelete'])->name('book.softdelete');
Route::get('trashex',[App\Http\controllers\BookController::class,'trashedBooks'])->name('trashedBooks');
Route::get('restore/{id}',[App\Http\controllers\BookController::class,'backFromSoftDelete'])->name('book.restore');
Route::get('harddelte/{id}',[App\Http\controllers\BookController::class,'deleteForEver'])->name('book.harddelte');




