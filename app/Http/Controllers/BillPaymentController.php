<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillPaymentController extends Controller
{
    public function electricity_bill(){
        return view("bill-payment.electricity-bill");
    }
    public function mobile_postpaid(){
        return view("bill-payment.mobile-postpaid");
    }
    public function gas(){
        return view("bill-payment.gas");
    }
    public function water(){
        return view("bill-payment.water");
    }
    public function broad_band(){
        return view("bill-payment.broad-band");
    }
    public function landline(){
        return view("bill-payment.landline");
    }
    public function indurance(){
        return view("bill-payment.indurance");
    }
    public function fastag(){
        return view("bill-payment.fastag");
    }
    public function loan(){
        return view("bill-payment.loan");
    }
    public function recharge(){
        return view("bill-payment.recharge");
    }
    public function dth(){
        return view("bill-payment.dth");
    }
    public function creditcard(){
        return view("bill-payment.creditcard");
    }
    public function moneytransfer(){
        return view("bill-payment.moneytransfer");
    }
    public function demo(){
        return view("bill-payment.demo");
    }
    public function rentpayment(){
        return view("bill-payment.rentpayment");
    }
    public function matm(){
        return view("bill-payment.matm");
    }
    public function aeps(){
        return view("bill-payment.aeps");
    }
    public function paymentrequest(){
        return view("bill-payment.payment-request");
    }
}

