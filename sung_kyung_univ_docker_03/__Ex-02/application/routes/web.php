<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\ChangePasswordController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Route::middleware(["logger"])->group(function () {
    Route::get("/test", [TestController::class, "test"]);

    Route::get("/", [DashboardController::class, "index"]);
    Route::get("/dashboard", [DashboardController::class, "index"]);
    Route::get("/dashboard/statistics", [
        DashboardController::class,
        "statistics",
    ]);
    Route::get("/dashboard/memberManagement", [
        DashboardController::class,
        "memberManagement",
    ]);
    Route::get("/dashboard/playManagement", [
        DashboardController::class,
        "playManagement",
    ]);
    Route::get("/dashboard/setting", [DashboardController::class, "setting"]);

    Route::get("/dashboard/document", [DashboardController::class, "document"]);

    // Route::get("/reset-password/{token}", function ($token) {
    //     return view("auth.reset-password", ["token" => $token]);
    // })->name("password.reset");

    // Route::get("/password/reset", [
    //     ResetPasswordController::class,
    //     "showResetForm",
    // ])->name("password.reset");
    // Route::post("/password/reset", [ResetPasswordController::class, "reset"]);

    Route::get("change-password", [ChangePasswordController::class, "index"]);
    Route::post("change-password", [
        ChangePasswordController::class,
        "changePassword",
    ]);
});

Auth::routes();

Route::get("/menu_1_a", [TestController::class, "menu_1_a"]);
Route::get("/menu_1_b", [TestController::class, "menu_1_b"]);

Route::get("/menu_2_a", [TestController::class, "menu_2_a"]);
Route::get("/menu_2_b", [TestController::class, "menu_2_b"]);
