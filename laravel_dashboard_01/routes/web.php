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

Route::get("/dashboard_01", [
    App\Http\Controllers\HomeController::class,
    "dashboard_01",
]);
Route::get("/dashboard_02", [
    App\Http\Controllers\HomeController::class,
    "dashboard_02",
]);
Route::get("/dashboard_03", [
    App\Http\Controllers\HomeController::class,
    "dashboard_03",
]);
