<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib.usersbook', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('status_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('lib.users');
            $table->foreign('book_id')->references('id')->on('lib.books');
            $table->foreign('status_id')->references('id')->on('lib.status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib.usersbook');
    }
}
