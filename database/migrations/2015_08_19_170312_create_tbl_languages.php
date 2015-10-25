<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblLanguages extends Migration
{

    public function up()
    {
        Schema::create('languages', function(Blueprint $table){
           $table->increments('id');
           $table->string('lang_name');
           $table->string('code');
           $table->string('icon');
           $table->string('folder');
           $table->tinyInteger('status');
           $table->integer('order');
           $table->string('unit', 30);
           $table->float('ratio_currency')->default(1);
           $table->tinyInteger('default')->default(0);
           $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
