<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get("/", [App\Http\Controllers\HomeController::class, "index"]);

Route::get("/menu1_1", [App\Http\Controllers\HomeController::class, "menu1_1"]);
Route::get("/menu1_2", [App\Http\Controllers\HomeController::class, "menu1_2"]);
