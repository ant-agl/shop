<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::active()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::find($orderId);
        return view('admin.orders.show', compact('order'));
    }
}
