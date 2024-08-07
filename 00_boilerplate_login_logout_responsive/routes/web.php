<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\TestController;

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

// Route::get("/dashboard", function () {
//     return view("dashboard.index");
// });

Route::middleware(["logger"])->group(function () {
    Route::get("/test", [TestController::class, "test"]);

    Route::get("/", [DashboardController::class, "index"]);
    Route::get("/dashboard", [DashboardController::class, "index"]);

    Route::get("/dashboard/menu_1", [DashboardController::class, "menu_1"]);
    Route::get("/dashboard/menu_2", [DashboardController::class, "menu_2"]);

    Route::get("/dashboard/setting", [DashboardController::class, "setting"]);

    Route::get("change-password", [ChangePasswordController::class, "index"]);
    Route::post("change-password", [
        ChangePasswordController::class,
        "changePassword",
    ]);
});

Auth::routes();

// Route::get("/home", [
//     App\Http\Controllers\HomeController::class,
//     "index",
// ])->name("home");

// Route::middleware(["logger"])->group(function () {
//     Route::get("/dashboard", function () {
//         return "welcome to logger middleware implementation";
//     });

//     Route::post("/", function (Request $request) {
//         // to do something with your request and return the response
//         return "yes it is working as required";
//     });
// });
