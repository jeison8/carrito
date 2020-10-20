<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        if ($user->is_admin) {
            $orders = Order::all();
        } else {
            $orders = Order::where('users_id', $user->id)->get();
        }

        foreach ($orders as $order) {
            $order->products_id  = json_decode($order->products_id);
        }
        return view('order.index', compact('orders'));
    }


    public function reOrder(Order $order)
    {
        $order->products_id  = json_decode($order->products_id);

        $user = User::where('id', Auth::user()->id)->first();

        $departments = Department::orderBy('name', 'ASC')->get();

        return view('order.reOrder', compact('user', 'departments', 'order'));
    }
}
