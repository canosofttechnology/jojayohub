<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->char('price', 55);
            $table->string('order_id');
            $table->integer('quantity');
            $table->enum('status', ['Processing','Sent for Shipping','Delivered'])->default('Processing');
            $table->char('delivery_date', 55)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
