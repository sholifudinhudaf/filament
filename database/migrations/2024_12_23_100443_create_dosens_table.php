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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique(); // Kolom nip
            $table->string('nama', 128); // Kolom nama
            $table->enum('jenis_kelamin', ['L', 'P']); // Kolom jenis kelamin
            $table->string('alamat', 128); // Kolom alamat
            $table->date('tanggal_lahir'); // Kolom tanggal lahir
            $table->string('bidang_keahlian', 128); // Kolom bidang keahlian
            $table->timestamps(); // Kolom timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
