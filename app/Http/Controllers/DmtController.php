<?php

namespace App\Http\Controllers;

use App\Models\BankList;
use App\Models\DmtBeneficiary;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DmtController extends Controller
{
    public $remitter = "dmt/remitter/";
    public $beneficiary = "dmt/beneficiary/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phone)
    {
        $remitter_detail = $this->remitter . 'queryremitter';
        $body = array("mobile" => $phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($remitter_detail, $body));
        $detail  = array();
        if ($res->response_code == 1) {
            $detail = $res->data;
        }
        $beneficiary_detail = $this->beneficiary . 'registerbeneficiary/fetchbeneficiary';
        $body = array("mobile" => $phone);
        $res = json_decode(ApiController::post($beneficiary_detail, $body));
        $beneficiary_fetch  = array();
        if ($res->response_code == 1) {
            $beneficiary_fetchs = $res->data;
        }
        $banks = BankList::all();
        return view('dmt.index', compact('detail', 'beneficiary_fetchs', 'banks'));
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
        $service = $this->remitter . 'queryremitter';
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
        $service = $this->remitter . 'queryremitter';
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
        $service = $this->remitter . 'registerremitter';
        $body = array("mobile" => $request->phone, "firstname" => $request->fname, "lastname" => $request->lname, "address" => $request->address, "otp" => $request->otp, "pincode" => $request->pin_code, "stateresp" => $request->stateresp, "bank3_flag" => "yes", "dob" => $request->fname, "gst_state" => "07");
        $res = json_decode(ApiController::post($service, $body));
        if ($res->response_code == 1) {
            return redirect()->route('dmt.remmiter')->with("status", $res->message);
        } else {
            return redirect()->route("dmt.register-remmiter", $request->phone)->with("status", $res->message);
        }
    }
    public function store_register_beneficiary(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:10',
            'pin_code' => 'required|max:6',
            "dob" => 'required',
            "address" => 'required',
            "bank" => 'required',
            "benename" => 'required',
            "accno" => 'required|min:10|max:12',
            "confirmaccno" => 'required|same:accno|min:10|max:12',
            "radio_ifsc" => 'required',
            "ifsccode" => 'max:11'
        ]);
        $service = $this->beneficiary . 'registerbeneficiary';
        $body = array();
        if ($request->radio_ifsc == "Yes") {
            $body = array(
                "mobile" => $request->phone,
                "benename" => $request->benename,
                "bankid" => $request->bank,
                "accno" => $request->accno,
                "ifsccode" => $request->ifsccode,
                "verified" => "0",
                "gst_state" => "07",
                "dob" => $request->dob,
                "address" => $request->address,
                "pincode" => $request->pin_code
            );
        } else {
            $body = array(
                "mobile" => $request->phone,
                "benename" => $request->benename,
                "bankid" => $request->bank,
                "accno" => $request->accno,
                "verified" => "0",
                "gst_state" => "07",
                "dob" => $request->dob,
                "address" => $request->address,
                "pincode" => $request->pin_code
            );
        }
        $res = json_decode(ApiController::post($service, $body));
        if ($res->response_code == 1) {
            $data = $res->data;
            DmtBeneficiary::create([
                "user_id" => Auth::id(),
                "bene_id" => $data->bene_id,
                "mobile" => $request->phone,
                "benename" => $data->name,
                "bankid" => $data->bankid,
                "accno" => $data->accno,
                "pincode" => $request->pin_code,
                "dob" => $request->dob,
                "address" => $request->address,
                "ifsc" => $data->ifsc
            ]);
            return redirect()->route('dmt.index', $request->phone)->with("success", $res->message);
            exit();
        }
        return redirect()->route("dmt.index", $request->phone)->with("danger", $res->message);
    }
    public function beneficiary_delete($id, $phone)
    {
        $beneficiary_table = DmtBeneficiary::where("bene_id", $id)->first();
        DmtBeneficiary::destroy($beneficiary_table->id);
        $beneficiary_detail = $this->beneficiary . 'registerbeneficiary/deletebeneficiary';
        $body = array("mobile" => $phone, "bene_id" => $id);
        $res = json_decode(ApiController::post($beneficiary_detail, $body));
        return redirect()->route('dmt.index', $phone)->with("status", $res->message);
    }
    public function beneficiary_status($id)
    {
        $beneficiary_table = DmtBeneficiary::where("bene_id", $id)->where('user_id', Auth::id())->first();
        $body = array(
            "mobile" => $beneficiary_table->mobile,
            "benename" => $beneficiary_table->benename,
            "bankid" => $beneficiary_table->bankid,
            "accno" => $beneficiary_table->accno,
            "gst_state" => "07",
            "dob" => $beneficiary_table->dob,
            "address" => $beneficiary_table->address,
            "pincode" => $beneficiary_table->pincode,
            "referenceid" => rand(9999999999, 1000000000),
            "bene_id" => $id
        );
        $beneficiary_detail = $this->beneficiary . 'registerbeneficiary/benenameverify';
        $res = json_decode(ApiController::post($beneficiary_detail, $body));
        return redirect()->route('dmt.index', $beneficiary_table->mobile)->with("success", "Beneficiary Account Verified Successfully!");
    }
    public function confirm(Request $request)
    {
        $remitter_detail = $this->remitter . 'queryremitter';
        $body = array("mobile" => $request->phone, "bank3_flag" => "NO");
        $res = json_decode(ApiController::post($remitter_detail, $body));
        $detail  = array();
        if ($res->response_code == 1) {
            $detail = $res->data;
        }
        $beneficiary_detail = $this->beneficiary . 'registerbeneficiary/fetchbeneficiarybybeneid';
        $body = array("mobile" => $request->phone,"beneid"=>$request->bene_id);
        $res = json_decode(ApiController::post($beneficiary_detail, $body));
        $beneficiary_fetch_bene  = array();
        if ($res->response_code == 1) {
            $beneficiary_fetch_bene = $res->data;
        }
        $amount = $request->amount;
        return view('dmt.confirm', compact('detail', 'beneficiary_fetch_bene', 'amount')); 
    }
}
