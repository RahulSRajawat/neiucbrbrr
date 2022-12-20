<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BillPaymentController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\SuperDistributorController;
use App\Http\Controllers\UserController;
use App\Mail\CallBackMail;
use App\Models\Callbackdata;
use App\Models\JWT;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashfreePaymentController;

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
Route::get('migrate', function () {

	/* php artisan migrate */
    Artisan::call('migrate');
    dd("Done");
});
Route::get("callback-data",function(){
    $testMailData = [
        'title' => 'Test Email From AllPHPTricks.com',
        'body' => 'This is the body of test email.'
    ];
     Mail::to('jepecox303@bitvoo.com')->send(new CallBackMail($testMailData));
});
Route::get('/test', function () {
    // Bank List Data
    // $service = 'aeps/banklist/index';
    // $res = json_decode(ApiController::post($service));
    // echo "<pre>";
    // print_r($res);

    // ONBOARDING POST DATA
    // $service = 'onboard/onboardnew/getonboardurl';
    // $callback_url = env('APP_URL')."api/v1/payscallback";
    // $body = array(
    //         "merchantcode"=>"19",
    //         "mobile"=>"8818820004",
    //         "is_new"=>"0",
    //         "email"=>"vevbyervrv23@diratu.com",
    //         "firm"=>"MYMONEYSKING",
    //         "callback"=>$callback_url
    //         );
    // $res = json_decode(ApiController::post($service,$body));
    // echo "<pre>";
    // print_r($res);
     // ONBOARDING POST DATA
     $service = 'recharge/recharge/dorecharge';
     $callback_url = env('APP_URL')."api/v1/payscallback";
     $body = array(
             "operator"=>11,
             "canumber"=>7000802198,
             "amount"=>"10",
             "referenceid"=>2725285815
             );
     $res = json_decode(ApiController::post($service,$body));
     echo "<pre>";
     print_r($res);
});
Route::get('/', function () {
    return view("auth.login");
});
Route::group(["middleware" => "PreventBackHistory"], function () {
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('complete-profile', [UserController::class, 'complete_user'])->name('complete-user.complete');
Route::group(["prefix" => "admin", "middleware" => ["isAdmin", "auth", "PreventBackHistory"]], function () {
    Route::get("dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
    Route::get("user-login-history", [LoginHistoryController::class, 'index'])->name("login-history.index");
    Route::get("users", [UserController::class, 'index'])->name("all-user.index");
    Route::get("pending-users", [UserController::class, 'pending_user'])->name("pending-user.pending");
    Route::post("pending_user", [UserController::class, 'pending_user_update'])->name("pending-user.update");
    // Products Start
    Route::get("all-products", [ProductsController::class, 'index'])->name("all-product.index");
    Route::get("add-product", [ProductsController::class, 'create'])->name("all-product.create");
    Route::post("store-product", [ProductsController::class, 'store'])->name("all-product.store");
    Route::get("destroy-product/{id}", [ProductsController::class, 'destroy'])->name("all-product.destroy");
    Route::get("status-product/{id}/{status}", [ProductsController::class, 'status'])->name("all-product.status");
    // Products End
    // Invoice Start
    Route::get("all-invoice", [InvoiceController::class, 'index'])->name("all-invoice.index");
    Route::get("user-invoice-view/{invoice_number}", [InvoiceController::class, 'invoice_view'])->name("user-invoice.view");
    Route::post("invoice-status", [InvoiceController::class, 'invoice_status'])->name("invoice.status");
    // Invoice End
});
Route::group(["prefix" => "retailer", "middleware" => ["isRetailer", "auth", "PreventBackHistory"]], function () {
    Route::get("dashboard", [RetailerController::class, 'index'])->name("retailer.dashboard");
    Route::get("all-product", [ProductsController::class, 'view'])->name("all-product.view");
    Route::get("product-detail/{link}", [ProductsController::class, 'details'])->name("product.detail");
    // Cart Start
    Route::get("add-to-cart", [CartsController::class, 'index'])->name("cart.index");
    Route::post("cart-update", [CartsController::class, 'update'])->name("cart.update");
    Route::get("checkout", [CartsController::class, 'checkout'])->name("cart.checkout");
    Route::get("destroy-cart/{id}", [CartsController::class, 'destroy'])->name("cart.destroy");
    Route::post("invoice-create", [InvoiceController::class, 'store'])->name("invoice.create");
    Route::get("thank-you", [InvoiceController::class, 'order_success'])->name("cart.thank-you");
    Route::get("invoice", [InvoiceController::class, 'index'])->name("invoice.index");
    Route::get("invoice-view/{invoice_number}", [InvoiceController::class, 'invoice_view'])->name("invoice.view");
    // Cart End
    Route::group(["prefix"=>"loan"],function(){
        Route::get('view', [LoanController::class,'index'])->name("loan.view");
        Route::get('personal', [LoanController::class,'personal'])->name("loan.personal");
        Route::get('business', [LoanController::class,'business'])->name("loan.business");
        Route::get('gold', [LoanController::class,'gold'])->name("loan.gold");
        Route::get('home-salary-employee', [LoanController::class,'home_salary_employed'])->name("loan.home-salary-employee");
        Route::get('home-self-employee', [LoanController::class,'home_self_employed'])->name("loan.home-self-employee");
        Route::get('property-salary-employee', [LoanController::class,'property_salary_employed'])->name("loan.property-salary-employee");
        Route::get('property-self-employee', [LoanController::class,'property_self_employed'])->name("loan.property-self-employee");
    });
});
Route::group(["prefix" => "employee", "middleware" => ["isEmployee", "auth", "PreventBackHistory"]], function () {
    Route::get("dashboard", [EmployeeController::class, 'index'])->name("employee.dashboard");
});
Route::group(["prefix" => "distributor", "middleware" => ["isDistributor", "auth", "PreventBackHistory"]], function () {
    Route::get("dashboard", [DistributorController::class, 'index'])->name("distributor.dashboard");
});
Route::group(["prefix" => "superdistributor", "middleware" => ["isSuperDistributor", "auth", "PreventBackHistory"]], function () {
    Route::get("dashboard", [SuperDistributorController::class, 'index'])->name("superdistributor.dashboard");
});
// Static Page
Route::get("/electricity-bill", [BillPaymentController::class, 'electricity_bill']);
Route::get("/mobile-postpaid", [BillPaymentController::class, 'mobile_postpaid']);
Route::get("/gas", [BillPaymentController::class, 'gas']);
Route::get("/water", [BillPaymentController::class, 'water']);
Route::get("/broad-band", [BillPaymentController::class, 'broad_band']);
Route::get("/landline", [BillPaymentController::class, 'landline']);
Route::get("/indurance", [BillPaymentController::class, 'indurance']);
Route::get("/fastag", [BillPaymentController::class, 'fastag']);
Route::get("/loan", [BillPaymentController::class, 'loan']);
Route::get("/recharge", [BillPaymentController::class, 'recharge']);
Route::get("/dth", [BillPaymentController::class, 'dth']);
Route::get("/creditcard", [BillPaymentController::class, 'creditcard']);
Route::get("/rentpayment", [BillPaymentController::class, 'rentpayment']);
Route::get("/demo", [BillPaymentController::class, 'demo']);
Route::get("/matm", [BillPaymentController::class, 'matm']);
Route::get("/moneytransfer", [BillPaymentController::class, 'moneytransfer']);
Route::get("/payment-request", [BillPaymentController::class, 'paymentrequest']);


//cashfree payment Gatway

Route::get('cashfree/payments/create', [CashfreePaymentController::class, 'create'])->name('callback');
Route::post('cashfree/payments/store', [CashfreePaymentController::class, 'store'])->name('store');
Route::any('cashfree/payments/success', [CashfreePaymentController::class, 'success'])->name('success');

//qr-code genrate
Route::get('/qrcode', function () {
    return QrCode::size(200)->generate('rahulsingh');
});

// 
