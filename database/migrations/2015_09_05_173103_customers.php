<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customers extends Migration
{

    public function up()
    {
        Schema::create('customers', function(Blueprint $table){
            $table->increments('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('status', 30)->default('unconfirmed');
            $table->string('key_active');
            $table->string('description');
            $table->string('ip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
