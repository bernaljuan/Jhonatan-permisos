<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			// before Larave7
			// $table->unsignedBigInteger('user_id');
			// $table->foreign('user_id')->references('id')->on('users');

			// Foreign key Laravel7 uses 'nullable'
			// $table->foreignId('user_id')->nullable()->constrained();

			// Laravel7
			$table->foreignId('user_id')->constrained();
			$table->integer('product_id')->unsigned();
			$table->string('address')->nullable();
			$table->string('size')->nullable();
			$table->string('toppings')->nullable();
			$table->string('instructions')->nullable();
			$table->decimal("cantidad", 9, 0);
			$table->foreignId('status_id')->unsigned()->default(1)->constrained();

			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders');
	}
}
