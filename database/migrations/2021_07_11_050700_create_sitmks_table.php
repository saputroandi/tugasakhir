<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSITMKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitmks', function (Blueprint $table) {
            $table->bigInteger('sitmk_id')->primary();
            $table->bigInteger('order_id');
            $table->string('nama_sitmk', 20);
            $table->string('jabatan_sitmk', 20);
            $table->string('alamat_sitmk', 100);
            $table->date('mulai_sitmk');
            $table->date('sampai_sitmk');
            $table->string('alasan_sitmk', 100);
            $table->string('penerima_sitmk', 20);
            $table->string('tmpt_sitmk_terbit', 20);
            $table->date('tgl_sitmk_terbit');

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
        Schema::dropIfExists('sitmks');
    }
}
