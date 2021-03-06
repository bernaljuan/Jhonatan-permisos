<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Order;
use App\Status;
use App\Product;
use App\ProductSold;
use Illuminate\Http\Request;
use App\Events\OrderStatusChangedEvent;

class AdminOrderController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        $orders = Order::with(['customer', 'status', 'products'])   
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

    public function update(Request $request, Order $order, Product $product)
    {
       
        $request->validate([
            'status_id' => 'required|numeric',
        ]);

        $order->status_id = $request->status_id;
        $order->save();
        event(new OrderStatusChangedEvent($order));

        if ( $order->status_id == 5) {
            $id = $request->order->product_id;
            $product = Product::findOrFail($id);
            $product->existencia = $product->existencia - $order->cantidad;
            $product->saveOrFail();

            $productoVendido = new Sale();
            $productoVendido->fill([
                "user_id" => $order->user_id,
                "order_id" => $order->id,
                "product" => $product->nombre,
                "cantidad" => $order->cantidad,
                "total" => $order->products->precio_venta * $order->cantidad,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();


            return redirect('/sales')->with('message', 'Venta realizada');
        } else {
            return back()->with('message', 'Orden actualizada');
        }
    }
}
