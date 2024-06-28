<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get("/", [HomeController::class, "index"]);

Route::get("/Menu1_1", [HomeController::class, "menu1_1"]);
Route::get("/Menu1_2", [HomeController::class, "menu1_2"]);
Route::get("/Menu1_3", [HomeController::class, "menu1_3"]);

Route::get("/Menu2_1", [HomeController::class, "menu2_1"]);
Route::get("/Menu2_2", [HomeController::class, "menu2_2"]);
Route::get("/Menu2_3", [HomeController::class, "menu2_3"]);
