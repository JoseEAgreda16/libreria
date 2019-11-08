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
        Schema::create('lib.books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedInteger('author_id');
            $table->date('fech_public');
            $table->unsignedInteger('genres_id');
            $table->string('quantity');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('lib.authors');
            $table->foreign('genres_id')->references('id')->on('lib.genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib.books');
    }
}
