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
    return view('welcome');
});

use App\Http\Controllers\BlogController;

Route::get('/home', [ BlogController::class, 'index']);
Route::get('/about', [ BlogController::class, 'about']);
Route::get('/article', [ BlogController::class, 'article']);
Route::get('/contact', [ BlogController::class, 'contact']);