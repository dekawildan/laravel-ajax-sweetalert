<?php

namespace App\Http\Controllers;
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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/',[komentarController::class, 'index']);
Route::get('/komentar',[komentarController::class, 'komentar']);
Route::post('/komentar',[komentarController::class, 'store']);
Route::put('/editkomentar/{id}',[komentarController::class, 'update']);
Route::get('/editkomentar/{id}',[komentarController::class, 'update']);
Route::delete('/deletekomentar/{id}',[komentarController::class, 'destroy']);
Route::get('/deletekomentar/{id}',[komentarController::class, 'destroy']);