<?php

use App\Http\Controllers\PaymentCallbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'payment'], function () {
        Route::post('/callback', [PaymentCallbackController::class, 'callback'])->name('payment.callback');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::post('/create', [OrderController::class, 'create'])->name('order.create');
        Route::get('/{id}', [OrderController::class, 'show'])->name('frontend.order.show');
    });
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
