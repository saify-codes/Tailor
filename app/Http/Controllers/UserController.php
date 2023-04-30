<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function place_order(Request $request)
    {
        $measurements = $request->except('_token', 'fname', 'lname', 'phone', 'address', 'price', 'delivery_date');
        $details = implode('|', array_map(fn ($k, $v) => "$k:$v", array_keys($measurements), $measurements)); // formating into string
        $fname = $request->fname;
        $lname = $request->lname;
        $phone = $request->phone;
        $address = $request->address;
        $price = $request->price;
        $delivery_date = $request->delivery_date;
        // dd($user_id,$fname,$lname,$phone,$address,$price,$delivery_date,$details);
        $request->session()->put([
            'fname' => $fname,
            'lname' => $lname,
            'phone' => $phone,
            'address' => $address,
            'price' => $price,
            'details' => $details,
            'delivery' => $delivery_date
        ]);



        return view('checkout')->with('order', $details)->with('price', $price);
    }

    public function checkout(Request $request)
    {

        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->fname = $request->session()->get('fname');
        $order->lname = $request->session()->get('lname');
        $order->phone = $request->session()->get('phone');
        $order->address = $request->session()->get('address');
        $order->price = $request->session()->get('price');
        $order->details = $request->session()->get('details');
        $order->delivery = $request->session()->get('delivery');
        $order->save();
        $request->session()->forget('fname');
        $request->session()->forget('lname');
        $request->session()->forget('phone');
        $request->session()->forget('address');
        $request->session()->forget('price');
        $request->session()->forget('details');
        $request->session()->forget('delivery');
        return redirect()->route('home');
    }

    public function my_orders()
    {
        $user_id = Auth::user()->id;
        $orders = Orders::select('id', 'status')->where('user_id', $user_id)->get();
        return view("myorders")->with('orders', $orders);
    }

    public function order_detail(Request $request)
    {
        $order_id = $request->query('id');
        if (!is_null($order_id)) {
            $order_details = Orders::select('id', 'fname', 'lname', 'phone', 'address', 'price', 'details', 'date', 'delivery', 'status')->find($order_id);
            if ($order_details != null)
                return view('order_detail')->with('order', $order_details);
        }

        return redirect()->route('myorders');
    }
}
