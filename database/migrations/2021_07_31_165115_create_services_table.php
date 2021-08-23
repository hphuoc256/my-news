<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('parent_id')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price',10,0)->nullable();
            $table->decimal('sell',10,0)->nullable();
            $table->text('image')->nullable();
            $table->integer('status')->default(1);
            $table->string('slug',255)->nullable();
            $table->string('meta_keyword',255)->nullable();
            $table->string('meta_description',255)->nullable();
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
    }
}
