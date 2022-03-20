<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MediaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('single/{id}',[App\Http\Controllers\HomeController::class,'show'])->name('single.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * upload media
 */
Route::get('media',[MediaController::class,'index'])->name('media.index');
Route::post('media/store',[MediaController::class,'store'])->name('media.store');
Route::post('media/destroy',[MediaController::class,'destroy'])->name('media.destroy');

Route::get('contact',[ContactController::class,'index'])->name('contact.index');

Route::get('contacts',[ContactController::class,'getAllContacts'])->name('contact.all');
Route::post('contact',[ContactController::class,'store'])->name('contact.store');
Route::get('contact/{id}',[ContactController::class,'show'])->name('contact.show');
Route::get('contact/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
Route::match(['put','patch'], 'contact/{id}',[ContactController::class,'update'])->name('contact.update');
Route::delete('contact/{id}',[ContactController::class,'destroy'])->name('contact.destroy');

// Route::middleware(['auth'])->group(function () {
//     Route::get('contacts',[ContactController::class,'getAllContacts'])->name('contact.all');
//     Route::post('contact',[ContactController::class,'store'])->name('contact.store');
//     Route::get('contact/{id}',[ContactController::class,'show'])->name('contact.show');
//     Route::get('contact/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
//     Route::match(['put','patch'], 'contact/{id}',[ContactController::class,'update'])->name('contact.update');
//     Route::delete('contact/{id}',[ContactController::class,'destroy'])->name('contact.destroy');
// });

Route::resource('category','App\Http\Controllers\Category\CategoryController');
Route::resource('posts','App\Http\Controllers\Post\PostsController');