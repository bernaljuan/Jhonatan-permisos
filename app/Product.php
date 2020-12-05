<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["nombre", "descripcion", "precio_compra", "precio_venta", "existencia",
];

public function post()
{
    return $this->hasOne('App\Post', 'product_id', 'id');
}

}
