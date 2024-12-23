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
        Schema::create('makuls', function (Blueprint $table) {
            $table->id();
            $table->string('kode_makul')->unique(); // Kolom kode_makul
            $table->string('nama_makul'); // Kolom nama_makul
            $table->integer('sks'); // Kolom sks
            $table->text('deskripsi'); // Kolom deskripsi
            $table->timestamps(); // Kolom timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makuls');
    }
};

