<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prepaid()
    { 
        $service = 'recharge/recharge/getoperator';
        $res = json_decode(ApiController::post($service));
        if ($res->responsecode == 1) {
            $operators = $res->data;
            return view('recharge.prepaid', compact('operators'));
        } else {
            $operators = array();
            return view('recharge.prepaid', compact('operators'));
        }
    }
    public function dth()
    {
        return view('recharge.dth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prepaid_store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'phone' => 'required|max:10',
            'operator' => 'required',
            'amount' => 'required|numeric|min:10'
        ]);
        if ($validated->fails()) {
            return response(["status" => 'errors', 'messages' =>  $validated->errors()->all()]);
            exit();
        }
        $user_id = $request->user_id;
        $user = User::find($user_id);
        if ($user->balanceInt < $request->amount) {
            return response(["status" => 'error', 'msg' => 'Your Wallet Balance Is Low!']);
            exit();
        }
        $service = 'recharge/recharge/dorecharge';
        $body = array(
            "operator" => $request->operator,
            "canumber" => $request->phone,
            "amount" => $request->amount,
            "referenceid" => rand(9999999999,1000000000)
        );
        $res = json_decode(ApiController::post($service, $body));
        if($res->status){
            $user->withdraw($request->amount);
            return response(["status"=>"success","msg"=>$res->message,"refid"=>$res->refid,"ackno"=>$res->ackno]);
        }else{
            return response(["status"=>"warning","msg"=>$res->message]);

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
