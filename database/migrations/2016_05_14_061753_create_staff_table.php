<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->char('phone',10);
            $table->string('password');
            $table->string('adress1');
            $table->string('adress2');
            $table->string('adress3');
            $table->string('adress4');
            $table->string('username');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff');
    }
}
