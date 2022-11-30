<?php
namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\Invoice;
use App\Models\prodcuts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Include_;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles->name == "Admin"){
            $invoices = Invoice::all();
        }else{
            $invoices = Invoice::where('user_id',Auth::id())->get();
        }
        return view('invoice.index',compact('invoices'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice_view($invoice_number)
    {
        $invoice = Invoice::where('invoice_number',$invoice_number)->first();
        $carts = Carts::where('invoice_id',$invoice->id)->get();
        return view("invoice.view",compact('invoice','carts'));
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
            'payment_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]);
        $user_id = Auth::id();
        $carts = Carts::where("status", 0)
            ->where("invoice_id", 0)
            ->where("user_id", $user_id)
            ->get();
        $grandtotal = $carts->sum(function ($items) {
            return $items["product_quantity"] * $items->product->price;
        });
        $last_invoice = Invoice::latest('id')->first();
        $invoice_number = invoice_num(1, 10, "PP-");
        $track_number = rand(99999999, 10000000);
        if ($last_invoice != null) {
            $number = str_replace("PP-", "", $last_invoice->invoice_number) + 1;
            if ($number > 1 && $number < 9) {
                $invoice_number = "PP-00000000" . $number;
            } elseif ($number >= 9 && $number < 100) {
                $invoice_number = "PP-0000000" . $number;
            } elseif ($number >= 100 && $number < 1000) {
                $invoice_number = "PP-000000" . $number;
            } elseif ($number >= 1000 && $number < 10000) {
                $invoice_number = "PP-00000" . $number;
            } elseif ($number >= 10000 && $number < 100000) {
                $invoice_number = "PP-0000" . $number;
            } elseif ($number >= 100000 && $number < 1000000) {
                $invoice_number = "PP-000" . $number;
            } elseif ($number >= 1000000 && $number < 10000000) {
                $invoice_number = "PP-00" . $number;
            } elseif ($number >= 10000000 && $number < 100000000) {
                $invoice_number = "PP-0" . $number;
            } else {
                $invoice_number = "PP-" . $number;
            }
        }
        if($request->payment_type == "Pay With Wallet"){
            $user = User::find($user_id);
            $user->withdraw($grandtotal);
        }
        $last_id = Invoice::insertGetId([
            'user_id' => $user_id,
            'invoice_number' => $invoice_number,
            'payment_method' => $request->payment_type,
            'invoice_status' => 'Pending',
            'grand_total' => $grandtotal,
            'currency' => 'inr',
            'track_number' => $track_number,
            'ship_firstname' => $request->first_name,
            'ship_lastname' => $request->last_name,
            'ship_email' => $request->email,
            'ship_phone' => $request->phone,
            'ship_address' => $request->address,
            'ship_zip' => $request->zip,
            'ship_country' => $request->country,
            'ship_state' => $request->state,
            'ship_city' => $request->city,
        ]);
        foreach ($carts as $cart) {
            Carts::find($cart->id)->update([
                'status'=>1,
                'invoice_id'=>$last_id
            ]);
            $remaing = $cart->product->stock - $cart->product_quantity;
            prodcuts::find($cart->product_id)->update([
                'stock'=>$remaing
            ]);
        }
        return redirect()->route("cart.thank-you");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function invoice_status(Request $request)
    {
        Invoice::find($request->id)->update([
            'invoice_status'=>$request->status
        ]);
        return redirect()->route('all-invoice.index')->with('status','Invoice Status Change Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    public function order_success(){
        return view("cart.thank" );
    }
}
function invoice_num($input, $pad_len = 7, $prefix = null)
{
    if ($pad_len <= strlen($input))
        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
    if (is_string($prefix))
        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
}
