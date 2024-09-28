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
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID for primary key
            $table->unsignedBigInteger('tenaga_kerja_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('tenaga_kerja_id')->references('id')->on('tenaga_kerjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
