<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id'); // primary key
            $table->timestamps();
            $table->string('first_name',15);
            $table->string('last_name',20);
            $table->string('password');
            $table->string('email');
            $table->char('phone',10);
            $table->string('adress1',45);
            $table->string('adress2',45);
            $table->string('adress3',45);
            $table->string('adress4',45);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
