<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            
                
     
            $table->increments('id');
            
            $table->string('Nombre');
            $table->string('cant');
            $table->string('Precio');
            $table->integer('categoria_id')->unsigned();
            $table->string('foto');
            $table->timestamps();


            $table->foreign('categoria_id')->references('id')->on('categorias');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
