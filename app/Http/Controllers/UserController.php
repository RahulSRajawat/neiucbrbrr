<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $users = DB::table("users")
                ->where("users.id", "!=", Auth::id())
                ->join("roles", "users.role", "roles.id")
                ->select("users.*", "roles.name as role_name")
                ->get();
        } else {
            $users = DB::table("users")
                ->where("users.id", "!=", Auth::id())
                ->join("roles", "users.role", "roles.id")
                ->select("users.*", "roles.name")
                ->get();
        }
        return view("user.index", compact("users"));
    }
    public function pending_user()
    {
        $users = DB::table("users")
            ->where("role", "==", 0)
            ->get();
        $roles = DB::table("roles")
            ->where("id", "!=", 1)
            ->get();
        return view("user.pending", compact("users", "roles"));
    }
    public function pending_user_update(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'role' => 'required'
        ]);
        $user = User::find($request->user_id);
        $user->update([
            "role" => $request->role,
            "status" => $request->status
        ]);
        return redirect()->route("all-user.index")->with('status', 'User Role Updated!');
    }
    public function complete_user(){
        
        return view("user.complete");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
