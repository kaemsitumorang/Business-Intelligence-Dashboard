<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debiturs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama');
            $table->string('no_ktp');
            $table->date('ttl');
            $table->integer('gaji');
            $table->integer('tanggungan');
            $table->string('kebutuhan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('debiturs');
    }
}
