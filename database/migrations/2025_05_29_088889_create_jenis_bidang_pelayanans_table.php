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
        Schema::create('jenis_bidang_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis')->unique();
            $table->foreignId('bidang_pelayanan_id')->constrained('bidang_pelayanans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_bidang_pelayanans');
    }
};
