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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month_id');
            $table->string('kdsatker');
            $table->string('bln');
            $table->string('tahun');
            $table->string('tanggal');
            $table->string('nogaji');
            $table->string('nip');
            $table->string('nmpeg');
            $table->string('kdgol');
            $table->string('npwp')->nullable();
            $table->string('kdbankspan')->nullable();
            $table->string('nmbankspan')->nullable();
            $table->string('norek')->nullable();
            $table->string('nmrek')->nullable();
            $table->string('nmcabbank')->nullable();
            $table->integer('jmlhari');
            $table->integer('tarif');
            $table->float('pph');
            $table->float('kotor');
            $table->float('potongan');
            $table->float('bersih');
            $table->timestamps();
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
