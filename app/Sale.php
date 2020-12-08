<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
        return $this->hasMany("App\ProductSold", "id_venta");
    }

    public function User()
    {
        return $this->belongsTo("App\User", "user_id");
    }
}
