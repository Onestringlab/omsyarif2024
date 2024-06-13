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
        Schema::create('grands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month_id');
            $table->string('nama');
            $table->string('nip');
            $table->string('npwp');
            $table->string('panggol');
            $table->string('jabatan');
            $table->string('grad');
            $table->string('maxmedmin');
            $table->integer('tunjangan');
            $table->float('potabs');
            $table->float('potkim');
            $table->integer('jumlahpot');
            $table->integer('jumtunjsetpot');
            $table->integer('tunjpph');
            $table->integer('bruto');
            $table->integer('potpph');
            $table->integer('netto');
            $table->string('status')->default('Setuju');
            $table->string('alasan')->nullable();
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grands');
    }
};
