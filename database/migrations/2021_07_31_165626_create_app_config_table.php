<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_config', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->nullable();
            $table->binary('name_table')->nullable();
            $table->text('content')->nullable();
            $table->integer('status')->nullable();
            $table->text('content_html')->nullable();
            $table->string('language')->nullable();
            $table->integer('content_key')->nullable();
            $table->integer('key')->nullable();
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
        Schema::dropIfExists('app_config');
    }
}

