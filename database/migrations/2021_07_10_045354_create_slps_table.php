<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slps', function (Blueprint $table) {
            $table->bigInteger('slp_id')->primary();
            $table->bigInteger('order_id');
            $table->string('nama_slp', 30);
            $table->string('tmpt_lahir_slp', 20);
            $table->date('tgl_lahir_slp');
            $table->string('jns_klm_slp', 10);
            $table->string('pendidikan_slp', 10);
            $table->string('no_hp_slp', 15);
            $table->string('email_slp', 30);
            $table->string('alamat_slp', 100);
            $table->string('posisi_slp', 20);
            $table->string('penerima_slp', 20);
            $table->string('tmpt_slp_terbit', 20);
            $table->date('tgl_slp_terbit');

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
        Schema::dropIfExists('slps');
    }
}
