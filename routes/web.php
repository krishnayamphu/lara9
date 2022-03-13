<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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

// Route::resource('test','App\Http\Controllers\TestController');