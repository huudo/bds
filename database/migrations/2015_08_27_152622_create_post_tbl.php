<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTbl extends Migration
{
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){
            $table->increments('id');
            $table->string('image');
            $table->string('image_ids');
            $table->integer('author_id');
            $table->tinyInteger('status')->defautl(1);
            $table->string('comment_status')->default(1);
            $table->integer('comment_count');
            $table->string('post_type', 30)->defautl('post');
            $table->timestamps();
        });
        
        Schema::create('post_desc', function(Blueprint $table){
            $table->integer('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('content');
            $table->text('custom');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_desc');
    }
}
