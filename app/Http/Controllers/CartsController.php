<?php
namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\prodcuts;
use Bavix\Wallet\Objects\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Carts::where("status", 0)
            ->where("invoice_id", 0)
            ->where("user_id", Auth::id())
            ->get();
        return view('cart.index', compact('carts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $carts =  Carts::where("status", 0)
            ->where("invoice_id", 0)
            ->where("user_id", Auth::id())
            ->get();
        return view("cart.checkout", compact('carts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $product = prodcuts::find($product_id);
        $product_quantity = 1;
        $last_cart = Carts::where('status', 0)->latest('id')->first();
        if ($last_cart != null) {
            $data = Carts::where('product_id', $product_id)
                ->where('status', 0)
                ->first();
            if ($data != null) {
                if ($data->product->stock < 1) {
                    return response()->json(array("res" => "warning", "msg" => 'Product Is Out Of Stock!', 'btn' => '<i class="fa fa-warning"></i> Sold'));
                    exit();
                } elseif ($data->count() > 0) {
                    return response()->json(array("res" => "warning", "msg" => 'Product Is Already In Cart!', 'btn' => '<i class="fa fa-warning"></i>  Already'));
                    exit();
                }
            }else{
                if ($product->stock < 1) {
                    return response()->json(array("res" => "warning", "msg" => 'Product Is Out Of Stock!', 'btn' => '<i class="fa fa-warning"></i> Sold'));
                    exit();
                }
            }
        } else {
            if ($product->stock < 1) {
                return response()->json(array("res" => "warning", "msg" => 'Product Is Out Of Stock!', 'btn' => '<i class="fa fa-warning"></i> Sold'));
                exit();
            }
        }
        $cart = Carts::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'product_quantity' => $product_quantity,
            'status' => 0,
            'invoice_id' => 0
        ]);
        return response()->json(array("res" => "success", "msg" => 'Product Add To Cart Successfully!', 'btn' => '<i class="fa fa-check"></i> Added'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            $cart_id = $request->id[$i];
            $product_quantity = $request->quantity[$i];
            $cart = Carts::find($cart_id);
            if ($cart->product->stock < 1) {
                return redirect()->route("cart.index")->with('error', 'This Product ' . $cart->product->title . ' Out Of Stock');
                exit();
            } elseif ($product_quantity > $cart->product->stock) {
                return redirect()->route("cart.index")->with('error', 'This Product ' . $cart->product->title . ' Available Only ' . $cart->product->stock . ' Stock');
                exit();
            }
            $cart->update([
                "product_quantity" => $product_quantity
            ]);
        }
        return redirect()->route("cart.index")->with('status', 'Product Quantity Update Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carts::destroy($id);
        return redirect()->route("cart.index")->with('status', 'Product Remove From Cart Successfully!');
    }
}
