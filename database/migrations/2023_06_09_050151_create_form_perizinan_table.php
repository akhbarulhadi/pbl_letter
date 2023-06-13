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
        Schema::create('form_perizinan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->string('kelas');
            $table->string('nama_dosen');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keperluan');
            $table->string('nama_ortu');
            $table->string('nomor_hp_ortu');
            $table->string('bukti_waldos');
            $table->string('bukti_izin');
            $table->string('format_surat_izin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_perizinan');
    }
};
