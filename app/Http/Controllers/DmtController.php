<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DmtController extends Controller
{
    public $service = "dmt/remitter/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phone)
    {
        $service = $this->service.'queryremitter';
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
        $service = $this->service.'queryremitter';
        $body = array("mobile" => $phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($service, $body));
        $stateresp  = "";
        if ($res->response_code == 0) {
            $stateresp = $res->stateresp;
        }
        return view("dmt.register-remmiter", compact('phone', 'stateresp'));
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
        $service = $this->service.'queryremitter';
        $body = array("mobile" => $request->phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($service, $body));
        if ($res->response_code == 1) {
            return redirect()->route('dmt.index', $request->phone)->with("status", $res->message);
        } elseif ($res->response_code  == 0) {
            return redirect()->route("dmt.register-remmiter", $request->phone)->with("status", $res->message);
        }
    }
    public function store_register_remmiter(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:10',
            'pin_code' => 'required|max:6',
            "fname" => 'required',
            "lname" => 'required',
            "otp" => 'required|max:6',
            "dob" => 'required',
            "address" => 'required'
        ]);
        
        $service = $this->service.'registerremitter';
        $body = array("mobile" => $request->phone,"firstname"=>$request->fname,"lastname"=>$request->lname,"address"=>$request->address,"otp"=>$request->otp,"pincode"=>$request->pin_code,"stateresp"=>$request->stateresp,"bank3_flag"=>"yes","dob"=>$request->fname,"gst_state"=>"07");
        $res = json_decode(ApiController::post($service, $body));
        if ($res->response_code == 1) {
            return redirect()->route('dmt.remmiter')->with("status", $res->message)->with("status", $res->message);
        } else {
            return redirect()->route("dmt.register-remmiter", $request->phone)->with("status", $res->message);
        }
    }

    public function confirm()
    {
        return view("dmt.confirm");
    }
}
