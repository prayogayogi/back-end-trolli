<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\Api\v1\CheckoutController;
use App\Http\Controllers\Api\v1\TransactionController;
use App\Http\Controllers\API\v1\Auth\AuthenticateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [AuthenticateController::class, "register"]);
Route::post("/login", [AuthenticateController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post("logout", [AuthenticateController::class, "logout"]);

    Route::get("/products", [ProductController::class, "all"]);
    Route::get("/transactions", [TransactionController::class, "all"]);
    Route::post("/checkout", [CheckoutController::class, "checkout"]);
});
