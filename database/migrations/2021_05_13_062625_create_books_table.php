<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('main_img');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('series_id')->references('id')->on('series');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('main_img')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
