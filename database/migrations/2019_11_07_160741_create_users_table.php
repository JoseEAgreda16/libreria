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
        Schema::create('lib.users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_card');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('roles_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('roles_id')->references('id')->on('lib.roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib.users');
    }
}
