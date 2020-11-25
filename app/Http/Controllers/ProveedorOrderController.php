<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChangedEvent;
use App\Order;
use App\StatusProveedor;
use Illuminate\Http\Request;

class ProveedorOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'status_proveedor'])->get();
        return view('proveedor.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $statuses = StatusProveedor::all();
        $currentStatus = $order->status_proveedor_id;
        return view('proveedor.edit', compact('order', 'statuses', 'currentStatus'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_proveedor_id' => 'required|numeric',
        ]);

        $order->status_proveedor_id = $request->status_proveedor_id;
        $order->save();

        event(new OrderStatusChangedEvent($order));

        return back()->with('message', 'Estado de la orden actualizado');
    }
}
