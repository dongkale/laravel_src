<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ZipController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/display", [DisplayController::class, "display"]);
Route::get("/test", [DisplayController::class, "test"]);

Route::get("/assetList", [DisplayController::class, "assetList"]);

Route::get("/create-zip", [ZipController::class, "downloadZip"]);
