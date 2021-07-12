<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spds', function (Blueprint $table) {
            $table->bigInteger('spd_id')->primary();
            $table->bigInteger('order_id');
            $table->string('nama_spd', 30);
            $table->string('perusahaan_spd', 50);
            $table->string('jabatan_spd', 30);
            $table->date('tgl_spd');
            $table->string('penerima_spd', 30);
            $table->string('tmpt_spd_terbit', 20);
            $table->date('tgl_spd_terbit');

            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spds');
    }
}