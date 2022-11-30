<?php
namespace App\Http\Controllers;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login_histories =  DB::table('users_login_history')
            ->where("users_login_history.user_id","!=",Auth::id())
            ->join('users', 'users_login_history.user_id', '=', 'users.id')
            ->select('users_login_history.*','users.name')
            ->get();
            return view("login-history.index",compact('login_histories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoginHistory  $loginHistory
     * @return \Illuminate\Http\Response
     */
    public function show(LoginHistory $loginHistory)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginHistory  $loginHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginHistory $loginHistory)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoginHistory  $loginHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginHistory $loginHistory)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginHistory  $loginHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginHistory $loginHistory)
    {
        //
    }
}
