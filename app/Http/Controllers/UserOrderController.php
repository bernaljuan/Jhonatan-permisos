<?php

namespace App\Http\Controllers;

use App\Post;
use App\Articulos;
use App\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller {
	public function index() {
		$user = auth()->user();
		$orders = Order::with(['products', 'status'])
		->where('user_id', $user->id)->get();
		// $orders = Order::has('status')->where('user_id', $user->id)->get();
		return view('order.index', compact('user', 'orders'));
	}

	public function create() {
		//dd(request()->all());
		$dato = Post::findOrFail(request()->id);
		//dd($datos);
		return view('order.create', compact('dato'));	
	}	
	
	public function store(Request $request) {
		$request->validate([
			'address' => 'required',
			'size' => 'required',
		]);

		$order = Order::create([
			'user_id' => auth()->user()->id,
			'product_id' => $request->product_id,
			'address' => $request->address,
			'size' => $request->size,
			'toppings' => implode(', ', $request->toppings),
			'instructions' => $request->instructions,
			'cantidad' => $request->cantidad,
		]);

		return redirect()->route('user.order.show', $order)->with('message', 'Orden recibida');
	}
	/**
	 * Display the specific resource
	 * @param  Order  $order [description]
	 * @return [type]        [description]
	 */
	public function show(Order $order) {
		return view('order.show', compact('order'));
	}


	public function edit(Order $order)
    {
        return view("order.edit", ["order" => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->fill($request->input());
        $order->saveOrFail();
        return redirect()->route("user.order")->with("mensaje", "Producto actualizado");
	}
	
	public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("user.order")->with("mensaje", "Producto eliminado");
    }
}