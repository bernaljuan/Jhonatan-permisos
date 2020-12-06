<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChangedEvent;
use App\Order;
use App\Status;
use App\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        $orders = Order::with(['customer', 'status', 'products'])
        ->where('status_proveedor_id', '=', 2)
        ->get();
        return view('admin.index', compact('orders', 'products'));
    }

    public function edit(Order $order)
    {
        $statuses = Status::all();
        $products = Product::all();
        $currentStatus = $order->status_id;
        return view('admin.edit', compact('order', 'statuses', 'currentStatus', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|numeric',
        ]);

        $order->status_id = $request->status_id;
        $order->save();

        event(new OrderStatusChangedEvent($order));

        return back()->with('message', 'Orden actualizada');
    }
}
