<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('inventories_id');
            $table->unsignedInteger('status_id');
            $table->date('date');
            $table->date('date_init');
            $table->date('date_end');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('inventories_id')->references('id')->on('inventories');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
