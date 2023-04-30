<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Tailor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TailorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("tailor.login");
    }

    public function orders(Request $request)
    {

        $tailor_id = $request->user('tailor')->id;
        return view("tailor.orders")->with('orders', Orders::where('tailor_id', $tailor_id)->where('status', 1)->get());
    }

    public function my_orders(Request $request)
    {

        $tailor_id = $request->user('tailor')->id;
        // dd(view("tailor.my_orders")->with('orders', Orders::where('tailor_id', $tailor_id)->where('status', 3)->get()));
        return view("tailor.my_orders")->with('orders', Orders::where('tailor_id', $tailor_id)->where('status', '!=', 1)->where('status', '!=', 4)->get());
    }

    public function accept(Request $request)
    {
        if ($request->has('id')) {
            $order = Orders::find($request->id);
            $order->status = 2;
            $order->save();
        }
        return redirect()->route('tailor.orders');
    }

    public function reject(Request $request)
    {
        if ($request->has('id')) {
            $order = Orders::find($request->id);
            $order->status = 4;
            $order->save();
        }
        return redirect()->route('tailor.orders');
    }

    public function complete(Request $request)
    {
        if ($request->has('id')) {
            $order = Orders::find($request->id);
            $order->status = 3;
            $order->save();
        }
        return redirect()->route('tailor.my_orders');
    }

    public function detail(Request $request)
    {
        $order_id = $request->query('id');
        if (!is_null($order_id)) {
            $order_details = Orders::select('id', 'fname', 'lname', 'phone', 'address', 'price', 'details', 'date', 'delivery', 'status')->find($order_id);
            if ($order_details != null)
                return view('tailor.order_detail')
                    ->with('order', $order_details);
        }
        return redirect()->route('tailor.my_orders');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        if (Auth::guard('tailor')->attempt($request->only('email', 'password'))) {
            return redirect()->route('tailor.orders');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function register()
    {
        return view("tailor.registor");
    }
    public function create_tailor(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|email|max:255|unique:". Tailor::class,
            'phone' => "required|max:25",
            'address' => "required|max:255",
            'password' => "required|min:8|max:16"
        ]);

        $tailor = Tailor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($tailor));

        Auth::guard('tailor')->login($tailor);

        return redirect(RouteServiceProvider::TAILOR_HOME);
    }

    
}
