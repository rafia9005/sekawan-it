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
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alat_kategori_id');
            $table->string('alat_nama');
            $table->string('alat_deskripsi');
            $table->string('alat_hargaperhari');
            $table->string('alat_stok');
            $table->timestamps();

            $table->foreign('alat_kategori_id')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat');
    }
};
