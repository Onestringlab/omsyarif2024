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
		Schema::create('presences', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('month_id');
			$table->string('nama');
			$table->string('nip');
			$table->string('jabatan')->nullable();
			$table->integer('vd')->nullable();
			$table->integer('tkd')->nullable();
			$table->integer('tl1')->nullable();
			$table->integer('tl2')->nullable();
			$table->integer('tl3')->nullable();
			$table->integer('tl4')->nullable();
			$table->integer('thm')->nullable();
			$table->integer('vp')->nullable();
			$table->integer('ik')->nullable();
			$table->integer('psw1')->nullable();
			$table->integer('psw2')->nullable();
			$table->integer('psw3')->nullable();
			$table->integer('psw4')->nullable();
			$table->integer('thp')->nullable();
			$table->integer('i')->nullable();
			$table->integer('dls')->nullable();
			$table->integer('ct')->nullable();
			$table->integer('clt')->nullable();
			$table->integer('cpp')->nullable();
			$table->integer('ctl')->nullable();
			$table->integer('tb')->nullable();
			$table->integer('ld')->nullable();
			$table->integer('bmt')->nullable();
			$table->integer('ib')->nullable();
			$table->integer('tmk')->nullable();
			$table->integer('cs1')->nullable();
			$table->integer('cs14')->nullable();
			$table->integer('cm1')->nullable();
			$table->integer('cm2')->nullable();
			$table->integer('cm3')->nullable();
			$table->integer('cm41')->nullable();
			$table->integer('cm42')->nullable();
			$table->integer('cm43')->nullable();
			$table->integer('cap1')->nullable();
			$table->integer('cap10')->nullable();
			$table->integer('cb1')->nullable();
			$table->integer('cb2')->nullable();
			$table->integer('cb3')->nullable();
			$table->integer('tk')->nullable();
			$table->float('ptk')->nullable();
			$table->integer('kum')->nullable();
			$table->integer('kut')->nullable();
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
		Schema::dropIfExists('presences');
	}
};
