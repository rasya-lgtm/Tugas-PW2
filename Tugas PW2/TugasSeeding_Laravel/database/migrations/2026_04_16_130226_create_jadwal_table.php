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
        Schema::create('jadwal', function (Blueprint $table) {
        $table->id();
        $table->string('hari');
        $table->time('jam');
        $table->char('kelas', 2);
        
        // Ini kolom penghubungnya
        $table->char('kode_matakuliah', 8);
        $table->char('nidn', 10);
        
        // Ini perintah untuk membuat "Garis Relasi" (Foreign Key)
        $table->foreign('kode_matakuliah')->references('kode_matakuliah')->on('matakuliah')->onDelete('cascade');
        $table->foreign('nidn')->references('nidn')->on('dosen')->onDelete('cascade');
        
        $table->timestamps();
        
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
