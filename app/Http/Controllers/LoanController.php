<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("loan.index");
    }

    
    public function personal()
    {
        return view("loan.personal");
    }
    public function business()
    {
        return view("loan.business");
    }
    public function gold()
    {
        return view("loan.gold");
    }
    public function home_salary_employed()
    {
        return view("loan.home_salary_employed");
    }
    public function home_self_employed()
    {
        return view("loan.home_self_employed");
    }
    public function property_salary_employed()
    {
        return view("loan.property_salary_employed");
    }
    public function property_self_employed()
    {
        return view("loan.property_self_employed");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->loan_type =="") {
            return json_encode(array("res"=>"danger","msg"=>"Loan Type Is Requried !"));
            exit();
        }
        switch ($request->loan_type) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        return json_encode(array("res"=>"success","loan_type"=>$request->loan_type));
    }
}
