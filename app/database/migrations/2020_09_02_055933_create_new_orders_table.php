<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone');
            $table->string('name');
            $table->string('email');
            $table->string('company_name');
            $table->string('address');
            $table->string('order_id');
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
        Schema::dropIfExists('new_orders');
    }
}
