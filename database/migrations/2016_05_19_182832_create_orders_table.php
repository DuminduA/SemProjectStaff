<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->float('totalPrice')->unsigned();
            $table->integer('tolalQuantity');
            $table->string('Cancel');
            $table->boolean('status');//proceeded or not
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
        Schema::drop('orders');
    }
}
