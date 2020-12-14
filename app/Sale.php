<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'product',
        'cantidad',
        'total',
    ];

    public function customer() {
		return $this->belongsTo('App\User', 'user_id');
    }

    public function order() {
		return $this->belongsTo('App\Order', 'order_id');
    }
    
}
