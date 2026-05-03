<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();

            // wajib terdaftar sebagai user
            $table->string('nip', 191)->unique();

            // field excel yang dipakai
            $table->string('kdsatker_induk', 50)->nullable();
            $table->string('kdsatker_bekerja', 50)->nullable();
            $table->string('kdsatker_bayar', 50)->nullable();
            $table->string('kdanak', 10)->nullable();
            $table->string('nama', 191);
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('golongan', 20)->nullable();
            $table->string('nama_golongan', 100)->nullable();
            $table->string('jabatan', 255)->nullable();
            $table->string('kdduduk', 20)->nullable();
            $table->string('kdgapok', 20)->nullable();
            $table->string('kdkawin', 20)->nullable();
            $table->integer('pberas')->nullable();
            $table->integer('kdhakim')->nullable();
            $table->integer('kdpapua')->nullable();
            $table->integer('kdpencil')->nullable();
            $table->string('tahungapok', 10)->nullable();
            $table->string('kdbpjs2', 20)->nullable();
            $table->string('bulanakhir', 20)->nullable();
            $table->string('tahunakhir', 20)->nullable();
            $table->string('kdjab', 20)->nullable();
            $table->string('jablain', 20)->nullable();
            $table->decimal('tumum', 15, 2)->default(0);
            $table->decimal('sewarumah', 15, 2)->default(0);
            $table->string('npwp16', 32)->nullable();
            $table->string('nokk', 32)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nip')
                ->references('nip')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
