<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTbl extends Migration
{

    public function up()
    {
        Schema::create('taxs', function(Blueprint $table){
            $table->increments('id');
            $table->string('image');
            $table->string('type', 30)->default('cat');
            $table->string('dfname');
            $table->string('dfslug');
            $table->integer('order');
            $table->integer('parent');
            $table->integer('count');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        
        Schema::create('tax_desc', function(Blueprint $table){
            $table->integer('tax_id')->references('id')->on('taxs')->onDelete('cascade');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->timestamps();
        });
        
        Schema::create('tax_post', function(Blueprint $table){
           $table->integer('tax_id')->references('id')->on('taxs')->onDelete('cascade'); 
           $table->integer('post_id')->references('id')->on('posts')->onDelete('cascade'); 
           $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taxs');
        Schema::dropIfExists('tax_desc');
        Schema::dropIfExists('tax_post');
    }
}
