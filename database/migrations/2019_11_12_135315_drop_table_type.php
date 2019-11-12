<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lib.roles', function (Blueprint $table) {
            $table->dropForeign('type_id');
        });

        Schema::dropIfExists('lib.type');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {;
        Schema::create('lib.type', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('lib.roles', function (Blueprint $table) {

            $table->foreign('type_id')->references('id')->on('lib.type');

        });
    }

}
