<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phone)
    {
        $service = 'dmt/remitter/queryremitter';
        $body = array("mobile"=> $phone,"bank3_flag"=> "NO");
        $details = json_decode(ApiController::post($service,$body));
        return view('dmt.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dmt.remmiter");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query_remmiter(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:10'
        ]);
        $service = 'dmt/remitter/queryremitter';
        $body = array("mobile"=> $request->phone,"bank3_flag"=> "NO");
        $res = json_decode(ApiController::post($service,$body));
        if ($res->responsecode == 1) {
            return redirect()->route('dmt.index', $request->phone);
        }elseif($res->responsecode  == 0){

        }
    }

    public function confirm()
    {
        return view("dmt.confirm");
    }
}
