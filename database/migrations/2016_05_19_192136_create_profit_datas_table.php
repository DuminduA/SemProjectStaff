<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('profit_id')->unsigned();
            $table->integer('item_id')->unsigned();                 //Id Of The Revent Item
            $table->integer('quantity')->unsigned();                //Sold Quantity
            $table->integer('profit');                              //Sole Profit Of The Item
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profit_datas');
    }
}
