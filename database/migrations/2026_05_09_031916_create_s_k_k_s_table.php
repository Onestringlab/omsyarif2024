<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('keluarga_pegawai_id')
                ->constrained('keluarga_pegawai')
                ->cascadeOnDelete();

            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_berakhir');
            $table->string('file_skk');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skk');
    }
};