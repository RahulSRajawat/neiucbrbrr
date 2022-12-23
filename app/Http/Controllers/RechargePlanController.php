<?php
namespace App\Http\Controllers;
use App\Models\RechargePlan;
use App\Models\RechargePlanCategory;
use Illuminate\Http\Request;
class RechargePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $operators = array();
        $service = 'recharge/recharge/getoperator';
        $res = json_decode(ApiController::post($service));
        if ($res->responsecode == 1) {
            $operators = $res->data;
        }
        $rechargeplans = RechargePlan::all();
        return view('recharge-plan.index', compact('rechargeplans','operators'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rechargeplancategories = RechargePlanCategory::all();
        $operators = array();
        $service = 'recharge/recharge/getoperator';
        $res = json_decode(ApiController::post($service));
        if ($res->responsecode == 1) {
            $operators = $res->data;
        }
        return view('recharge-plan.create', compact('rechargeplancategories', 'operators'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_category' => 'required',
            'operator' => 'required',
            'validity' => 'required',
            'data' => 'required',
            'circle' => 'required',
            'price' => 'required',
            'desc' => 'required'
        ]);
        RechargePlan::create([
            'operator_id' => $request->operator,
            'circle' => $request->circle,
            'plan_category_id' => $request->plan_category,
            'data' => $request->data,
            'validity' => $request->validity,
            'price' => $request->price,
            'description' => $request->desc,
        ]);
        return redirect()->route('recharge-plan.index')->with("status", "Rechagre Plan Create Successfully!");
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
        RechargePlan::destroy($id);
        return redirect()->route("recharge-plan.index")->with('status', 'Recharge Plan Delete Successfully!');
    }
}
