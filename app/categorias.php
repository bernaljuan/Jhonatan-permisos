<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
     
protected $fillable = [
  'nombre'  
];
    
public function articulo(){
    return $this->hasMany(categorias::class);
}


}
