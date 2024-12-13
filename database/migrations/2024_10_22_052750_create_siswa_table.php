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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('jurusan');
            $table->decimal('nilai_bahasa_indonesia', 5, 2)->nullable();
            $table->decimal('nilai_informatika', 5, 2)->nullable();
            $table->decimal('nilai_pendidikan_pancasila', 5, 2)->nullable();
            $table->decimal('nilai_rata_rata', 5, 2)->nullable();
            $table->string('password');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
