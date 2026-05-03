<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_pegawai', function (Blueprint $table) {
            $table->id();

            $table->string('nip', 30);

            $table->enum('jenis_dokumen', [
                'naik_pangkat',
                'kgb',
                'jabatan',
                'kp4',
                'rumah_dinas',
            ]);

            $table->string('nomor_dokumen', 100)->nullable();
            $table->date('tanggal_dokumen')->nullable();

            $table->string('nama_file');       // original filename dari user
            $table->string('path_file');       // path di storage/app/...

            $table->string('uploaded_by', 30)->nullable(); // nip uploader

            $table->timestamps();

            // Foreign key ke users.nip
            $table->foreign('nip')
                    ->references('nip')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('dokumen_pegawai', function (Blueprint $table) {
            $table->dropForeign(['nip']);
        });

        Schema::dropIfExists('dokumen_pegawai');
    }
};