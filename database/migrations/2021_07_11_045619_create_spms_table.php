<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spms', function (Blueprint $table) {
            $table->bigInteger('spm_id')->primary();
            $table->bigInteger('order_id');
            $table->string('tmpt_spm_terbit', 20);
            $table->date('tgl_spm_terbit');
            $table->string('penerima_spm', 30);
            $table->string('nama_spm', 30);
            $table->string('jns_klm_spm', 10);
            $table->string('alamat_spm', 100);
            $table->string('pekerjaan_spm', 20);
            $table->string('kesalahan_spm', 100);

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
        Schema::dropIfExists('spms');
    }
}
