<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    
    protected $fillable = [
        'Nombre',
        'cant',
        'Precio',
        'categoria_id',
        'foto',
    ];


    public function categoria(){

    return $this->belongsTo(categorias::class,'categoria_id','id');
    
    }


   

}

