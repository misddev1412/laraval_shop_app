
<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPriceController;
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
Route::prefix('v1/admin/public')->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
    });
});

Route::group(['prefix' => 'v1/admin', 'middleware' => 'auth.admin'], function () {
    Route::resource('post', PostController::class);
    Route::resource('product', ProductController::class);
    //Product price
    Route::group(['prefix' => 'product/{productId}/price'], function () {
        Route::post('/', [ProductPriceController::class, 'store']);
        Route::get('/', [ProductPriceController::class, 'index']);
        Route::get('/{id}', [ProductPriceController::class, 'show']);
        Route::put('/{id}', [ProductPriceController::class, 'update']);
        Route::delete('/{id}', [ProductPriceController::class, 'destroy']);
    });
    //Order
    Route::resource('order', OrderController::class);
    Route::post('order/{order}/update-status', [OrderController::class, 'updateStatus']);
});


