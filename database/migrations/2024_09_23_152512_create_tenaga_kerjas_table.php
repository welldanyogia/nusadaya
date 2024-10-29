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
        Schema::create('tenaga_kerjas', function (Blueprint $table) {
            $table->uuid('id')->primary();  // UUID for id
            $table->uuid('project_id'); // Ensure this is defined as uuid
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->string('unit_pln');
            $table->string('penempatan');
            $table->string('no_spk');
            $table->string('nip');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('tempat_lahir'); // Place of birth
            $table->date('tanggal_lahir');  // Date of birth
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_kerjas');
    }
};
