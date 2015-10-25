<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTbl extends Migration {

    public function up() {
        Schema::create('slides', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->references('id')->on('taxs')->onDelete('cascade');
            $table->string('image');
            $table->string('link');
            $table->string('open_type', 30)->default('_blank');
            $table->integer('order');
            $table->integer('status')->default(1);
            $table->string('params');
            $table->timestamps();
        });
        
        Schema::create('slide_desc', function(Blueprint $table) {
            $table->integer('slide_id')->references('id')->on('slides')->onDelete('cascade');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('custom');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('slides');
        Schema::dropIfExists('slide_desc');
    }

}
