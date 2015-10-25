<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function(Blueprint $table){
            $table->increments('id');
            $table->string('image');
            $table->integer('author_id');
            $table->tinyInteger('status')->defautl(1);
            $table->timestamps();
        });

        Schema::create('services_lang', function(Blueprint $table){
            $table->integer('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('services_lang');
    }
}
