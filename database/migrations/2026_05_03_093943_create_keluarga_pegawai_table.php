<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaPegawaiTable extends Migration
{
    public function up()
    {
        Schema::create('keluarga_pegawai', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('nip', 30)->index();
            $table->string('nama');
            $table->date('tanggal_lahir')->nullable();
            $table->string('hubungan', 50);
            $table->string('tanggungan', 10)->nullable();
            $table->string('sekolah', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keluarga_pegawai');
    }
}