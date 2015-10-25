<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTbl extends Migration
{

    public function up()
    {
        Schema::create('banners', function(Blueprint $table){
            $table->increments('id');
            $table->string('image');
            $table->string('link');
            $table->string('open_type')->default('_blank');
            $table->integer('order')->default(10);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        
        Schema::create('tax_banner', function(Blueprint $table){
            $table->integer('tax_id')->references('id')->on('taxs')->onDelete('cascade');
            $table->integer('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
        Schema::dropIfExists('tax_banner');
    }
}
