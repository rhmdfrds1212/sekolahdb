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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('url_siswa');
            $table->string('nisn');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->foreignId('jurusan_id')->constrained();
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('guru_id')->constrained();
            $table->foreignId('eskul_id')->constrained();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
