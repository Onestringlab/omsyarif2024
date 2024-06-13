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
    Schema::create('salaries', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('month_id');
      $table->string('name');
      $table->string('nip')->nullable();
      $table->string('gol')->nullable();
      $table->string('rekening')->nullable();
      $table->string('bank')->nullable();
      $table->integer('bersih')->nullable();
      $table->integer('p1')->nullable();
      $table->integer('p2')->nullable();
      $table->integer('p3')->nullable();
      $table->integer('p4')->nullable();
      $table->integer('p5')->nullable();
      $table->integer('p6')->nullable();
      $table->integer('p7')->nullable();
      $table->integer('p8')->nullable();
      $table->integer('p9')->nullable();
      $table->integer('p10')->nullable();
      $table->integer('p11')->nullable();
      $table->integer('p12')->nullable();
      $table->integer('p13')->nullable();
      $table->integer('p14')->nullable();
      $table->integer('p15')->nullable();
      $table->integer('point')->nullable();
      $table->integer('bayar')->nullable();
      $table->timestamps();
      $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('salaries');
  }
};
