<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'nombre',
        'product_id',
        'descripcion',
        'categoria_id',     
        'foto',
    ];


    public function categoria(){

    return $this->belongsTo(categorias::class,'categoria_id','id');
    
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }

    public function products() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

    
}
