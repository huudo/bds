<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTbl extends Migration
{

    public function up()
    {
        Schema::create('menus', function(Blueprint $table){
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('parent');
            $table->string('type', 30);
            $table->integer('type_id');
            $table->tinyInteger('status');
            $table->string('icon');
            $table->integer('order')->default(100);
            $table->string('open_type');
            $table->timestamps();
        });
        
        Schema::create('menu_desc', function(Blueprint $table){
           $table->integer('menu_id')->references('id')->on('menus')->onDelete('cascade'); 
           $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade'); 
           $table->string('name');
           $table->string('slug');
           $table->string('link');
           $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_desc');
    }
}
