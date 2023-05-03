<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
    return redirect()->route("property-home");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::prefix("/property")->middleware("cookieAuth")->group(function () {

    /**
     * 
     * Without Cookie Aith
     */
    Route::withoutMiddleware("cookieAuth")->group(function () {
        Route::get("/", function () {
            return view("homepage.index");
        })->name("property-home");

        Route::post("/submit-property-access", [PropertyController::class, "submitAccessRequest"])->name("submit-property-access");

        Route::get("/verify-otp", [PropertyController::class, "showVerifyPage"])->name("verify-otp");
        Route::post("/verify-otp", [PropertyController::class, "VerifyOTP"])->name("verify-otp-submit");
    });


    /**
     * With Cookie Auth 
     */
    Route::get("/details", [PropertyController::class, "propertyDetailPage"])->name("property-details");
});
