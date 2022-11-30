<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return route("admin.dashboard");
        } elseif (Auth()->user()->role == 2) {
            return route("retailer.dashboard");
        } elseif (Auth()->user()->role == 3) {
            return route("employee.dashboard");
        } elseif (Auth()->user()->role == 4) {
            return route("distributor.dashboard");
        } elseif (Auth()->user()->role == 5) {
            return route("superdistributor.dashboard");
        } elseif (Auth()->user()->role == 6) {
            return route("b2c.dashboard");
        } elseif (Auth()->user()->role == 7) {
            return route("apiuser.dashboard");
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);
        if (auth()->attempt((array("email" => $input["email"], 'password' => $input["password"])))) {
            $ip =  $_SERVER['REMOTE_ADDR'];
            $userid = AUth::id();
            $date = date("Y-m-d");
            $time = date("H:i:s");
            LoginHistory::insert([
                "ip_address" => $ip,
                "login_date" => $date,
                "login_time" => $time,
                "user_id" => $userid,
            ]);
            if (Auth()->user()->role == 1) {
                return redirect()->route("admin.dashboard");
            } elseif (Auth()->user()->role == 2) {
                return redirect()->route("retailer.dashboard");
            } elseif (Auth()->user()->role == 3) {
                return redirect()->route("employee.dashboard");
            } elseif (Auth()->user()->role == 4) {
                return redirect()->route("distributor.dashboard");
            } elseif (Auth()->user()->role == 5) {
                return redirect()->route("superdistributor.dashboard");
            } elseif (Auth()->user()->role == 6) {
                return redirect()->route("b2c.dashboard");
            } elseif (Auth()->user()->role == 7) {
                return redirect()->route("apiuser.dashboard");
            }
        } else {
            return redirect()->route("login")->with("error", "Email and Password Are Wrong!");
        }
    }
}
