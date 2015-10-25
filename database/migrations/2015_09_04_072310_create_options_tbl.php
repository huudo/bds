<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTbl extends Migration
{

    public function up()
    {
        Schema::create('options', function(Blueprint $table){
            $table->increments('id');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('key');
            $table->string('name')->nullable();
            $table->text('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
