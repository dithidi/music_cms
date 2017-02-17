<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body', 10000);
            $table->string('author');
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create("imageables", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id');
            $table->integer('imageable_id');
            $table->string('imageable_type');
            $table->timestamps();
        });

        Schema::create("socials", function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('path')->nullable();
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
        Schema::dropIfExists('imageables');
        Schema::dropIfExists('images');
        Schema::dropIfExists('articles');
    }
}
