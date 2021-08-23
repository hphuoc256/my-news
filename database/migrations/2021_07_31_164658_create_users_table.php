<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('username',50)->nullable();
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->date('birthday')->nullable();
            $table->string('address',255)->nullable();
            $table->integer('gender')->nullable(); 
            $table->string('phone',15)->nullable();
            $table->integer('level')->default(0);
            $table->string('avatar',255)->nullable();
            $table->integer('status')->default(1); 
            $table->timestamp('email_verified_at')->nullable();
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
    }
}
