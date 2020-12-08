<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_solds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_sale");
            $table->foreign("id_sale")
                ->references("id")
                ->on("sales")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("descripcion");
            $table->string("nombre");
            $table->decimal("precio", 9, 0);
            $table->decimal("cantidad", 9, 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_solds');
    }
}
