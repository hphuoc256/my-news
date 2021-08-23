<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); 
            $table->string('name',100);
            $table->string('slug',255);
            $table->string('title',255)->nullable();
            $table->text('description')->nullable();
            $table->text('image',100)->nullable();
            $table->integer('status')->default(1);
            $table->integer('hot')->nullable();
            $table->integer('views')->nullable();
            $table->string('meta_keyword',255)->nullable();
            $table->string('meta_description',255)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
