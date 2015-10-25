<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenuTbl extends Migration
{

    public function up()
    {
        Schema::create('admin_menus', function(Blueprint $table){
            $table->increments('id');
            $table->string('icon');
            $table->string('name');
            $table->string('slug');
            $table->string('link');
            $table->string('route');
            $table->string('permission')->defautl('read');
            $table->integer('parent');
            $table->integer('order')->defautl(1);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
       
    }

    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
}
