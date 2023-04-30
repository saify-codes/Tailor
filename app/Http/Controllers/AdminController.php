<?php

namespace App\Http\Controllers;

use App\Models\{Orders, Tailor};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function orders()
    {
        return view("admin.orders")->with('data', ['orders' => Orders::paginate(25), 'tailors' => Tailor::all()]);
    }
    public function assign_order(Request $req)
    {

        $response = [];

        if ($req->has(['order_id', 'tailor_id'])) {

            $order = Orders::find($req->order_id);
            if ($order != null) {
                $order->is_assigned = true;
                $order->tailor_id = $req->tailor_id;
                $order->save();
                $response['status'] = 'done';
                $response['msg'] = 'Assigned';
                return response()->json($response);
            } else {
                $response['status'] = 'error';
                $response['msg'] = 'Invalid order id';
                return response()->json($response);
            }
        } else {
            return response()->json($response);
        }
        // return view("admin.orders")->with('orders',Orders::paginate(2));
    }

    public function order_detail(Request $request)
    {
        
        $order_id = $request->query('id');
        if (!is_null($order_id)) {
            $order_details = Orders::select('id', 'fname', 'lname', 'phone', 'address', 'price', 'details', 'date', 'delivery', 'status')->find($order_id);
            $tailor_details = Orders::find($order_id)->tailor;
            if ($order_details != null)
                return view('admin.order_detail')
                ->with('order', $order_details)
                ->with('tailor',$tailor_details);
        }

        return redirect()->route('admin.orderdetail');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'required|min:8|max:16'
            ]
        );

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
