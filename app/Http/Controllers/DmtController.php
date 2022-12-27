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
        $body = array("mobile" => $phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($service, $body));
        $detail  = array();
        if ($res->response_code == 1) {
            $detail = $res->data;
        }
        return view('dmt.index', compact('detail'));
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

    public function register_remmiter($phone)
    {
        $service = 'dmt/remitter/queryremitter';
        $body = array("mobile" => $phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($service, $body));
        $stateresp  = "";
        if ($res->response_code == 0) {
            $stateresp = $res->stateresp;
        } 
        return view("dmt.register-remmiter", compact('phone','stateresp'));
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
        $body = array("mobile" => $request->phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($service, $body));
        if ($res->response_code == 1) {
            return redirect()->route('dmt.index', $request->phone);
        } elseif ($res->response_code  == 0) {
            return redirect()->route("dmt.register-remmiter", $request->phone);
        }
    }

    public function confirm()
    {
        return view("dmt.confirm");
    }
}
