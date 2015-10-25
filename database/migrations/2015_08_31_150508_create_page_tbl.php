<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTbl extends Migration
{

    public function up()
    {
        Schema::create('pages', function(Blueprint $table){
            $table->increments('id');
            $table->string('image');
            $table->string('image_ids');
            $table->integer('author_id');
            $table->tinyInteger('status')->defautl(1);
            $table->string('template');
            $table->timestamps();
        });
        
        Schema::create('page_desc', function(Blueprint $table){
            $table->integer('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('page_desc');
    }
}
