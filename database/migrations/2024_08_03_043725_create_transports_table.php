<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month_id');
            $table->string('nama');
            $table->string('nip_nik')->nullable();
            $table->string('pangkat_gol')->nullable();
            $table->string('jabatan')->nullable();
            $table->integer('standar_biaya');
            $table->string('satker');
            $table->integer('total_kehadiran');
            $table->boolean('fasilitas_kendaraan_dinas');
            $table->integer('fasilitas_uang_transportasi');
            $table->integer('jumlah_diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
