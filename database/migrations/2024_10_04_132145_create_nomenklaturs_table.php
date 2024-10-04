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
        Schema::create('nomenklaturs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_satker');
            $table->string('p1')->nullable();
            $table->string('p2')->nullable();
            $table->string('p3')->nullable();
            $table->string('p4')->nullable();
            $table->string('p5')->nullable();
            $table->string('p6')->nullable();
            $table->string('p7')->nullable();
            $table->string('p8')->nullable();
            $table->string('p9')->nullable();
            $table->string('p10')->nullable();
            $table->string('p11')->nullable();
            $table->string('p12')->nullable();
            $table->string('p13')->nullable();
            $table->string('p14')->nullable();
            $table->string('p15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomenklaturs');
    }
};
