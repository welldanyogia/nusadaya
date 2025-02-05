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
        Schema::create('alat_kerjas', function (Blueprint $table) {
            $table->uuid('id')->primary();  // UUID for primary key
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->string('nama_alat');  // Tool name
            $table->date('tgl_kontrak');  // Contract date for alat kerja
            $table->integer('masa_pakai');  // Usage period in months
            $table->integer('masa_pakai_saat_ini');  // Usage period until now
            $table->integer('sisa_masa_pakai');  // Remaining usage period
            $table->text('keterangan')->nullable();  // Additional notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_kerjas');
    }
};
