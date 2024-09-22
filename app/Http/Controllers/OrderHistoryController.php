<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user's orders
        $orders = Auth::user()->orders()->with('orderDetails.product')->get();

        return view('user.order-history.index', ['orders' => $orders]);
    }

    public function getAllOrderHistory()
    {
        // Fetch the authenticated user's orders with their related order details and products
        $orders = Order::with('orderDetails.product')->get();
        return view('order-history.index', ['orders' => $orders]);
    }
}
