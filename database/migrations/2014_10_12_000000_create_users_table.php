<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('nicename');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar');
            $table->text('permission');
            $table->integer('group_id');
            $table->tinyInteger('admin');
            $table->tinyInteger('active');
            $table->string('active_code');
            $table->string('last_login');
            $table->string('reset_pass_code');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('user_groups', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('permission');
            $table->tinyInteger('active');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_groups');
    }
}
