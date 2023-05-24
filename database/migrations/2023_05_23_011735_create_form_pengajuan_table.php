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
        Schema::create('form_pengajuan', function (Blueprint $table) {
            $table->id();

            $table->string('nim')->unique();
            $table->string('name');
            $table->string('ditujukan');
            $table->string('alamat');
            $table->string('tugas_matkul');
            $table->string('keperluan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_pengajuan');
    }
};
