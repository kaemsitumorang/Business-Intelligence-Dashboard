<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krediturs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('status');
            $table->integer('id_debitur')->unsigned();
            $table->foreign('id_debitur')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('krediturs');
    }
}
