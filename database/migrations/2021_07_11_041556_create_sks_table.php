<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sks', function (Blueprint $table) {
            $table->bigInteger('sk_id')->primary();
            $table->bigInteger('order_id');
            $table->string('nama_sk', 30);
            $table->string('tmpt_lahir_sk', 20);
            $table->date('tgl_lahir_sk');
            $table->string('jns_klm_sk', 10);
            $table->string('no_ktp_sk', 17);
            $table->string('alamat_sk', 100);
            $table->string('nama_penerima_sk', 30);
            $table->string('tmpt_lahir_penerima_sk', 20);
            $table->date('tgl_lahir_penerima_sk');
            $table->string('jns_klm_penerima_sk', 10);
            $table->string('no_ktp_penerima_sk', 17);
            $table->string('alamat_penerima_sk', 100);
            $table->text('keperluan_sk');
            $table->string('tmpt_sk_terbit', 20);
            $table->date('tgl_sk_terbit');

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
        Schema::dropIfExists('sks');
    }
}
