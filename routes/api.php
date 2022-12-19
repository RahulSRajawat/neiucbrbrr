<?php
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoanController;
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
Route::group(['prefix' => 'v1'],function(){
    Route::any('/payscallback',[CallbackController::class]);
    Route::post('/cart-store',[CartsController::class,'store'])->name('add-to-cart');
    Route::post('/loan-store',[LoanController::class,'store'])->name('loan.store');
});

//Route::post('/v1/payscallback', 'PaymentController@Data'); // receives payment status
