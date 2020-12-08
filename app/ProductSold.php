<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    protected $table = "product_solds";
    protected $fillable = ["id_venta", "descripcion", "nommbre", "precio", "cantidad"];

}
