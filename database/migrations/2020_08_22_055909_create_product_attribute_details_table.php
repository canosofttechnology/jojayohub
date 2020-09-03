<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->unsignedBigInteger('product_attribute_id')->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('CASCADE');
            $table->unsignedBigInteger('attribute_value_id')->nullable();
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onDelete('CASCADE');
            $table->string('attribute_value')->nullable();
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
        Schema::dropIfExists('product_attribute_details');
    }
}
