<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $fillable = ['user_id', 'product_id', 'address', 'size', 'toppings', 'instructions', 'cantidad', 'status_id', 'status_proveedor_id'];

	// Get the customer that placed the order
	public function customer() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function articulos() {
		return $this->belongsTo(Articulos::class, 'articulo_id', 'id');
	}

	public function products() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	public function product() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	// Get the status of the order
	public function status() {
		return $this->belongsTo('App\Status');
	}

	public function status_proveedor() {
		return $this->belongsTo(StatusProveedor::class, 'status_proveedor_id', 'id');
	}

	public function posts() {
		return $this->belongsTo(Post::class, 'post_id', 'id');
	}


}
