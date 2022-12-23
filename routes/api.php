<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\RechargePlanController;
use App\Models\Carts;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function () {
    Route::post('/payscallback', [CallbackController::class, 'index']);
    Route::post('/cart-store', [CartsController::class, 'store'])->name('add-to-cart');
    Route::post('/loan-store', [LoanController::class, 'store'])->name('loan.store');
    Route::group(['prefix' => 'recharge'], function () {
        Route::post('prepaid-store', [RechargeController::class, 'prepaid_store'])->name("recharge.prepaid-store"); 
    });
    Route::group(['prefix' => 'recharge-plan'], function () {
        Route::post('plan-list', [RechargePlanController::class, 'plan_list'])->name("recharge-plan.plan-list"); 
    });
});

//Route::post('/v1/payscallback', 'PaymentController@Data'); // receives payment status
