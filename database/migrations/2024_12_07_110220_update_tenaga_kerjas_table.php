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
        Schema::table('tenaga_kerjas', function (Blueprint $table) {
            $table->string('kelompok')->nullable();
            $table->string('region')->nullable();
            $table->string('cabang')->nullable();
            $table->string('kategori')->nullable();
            $table->string('status')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_mulai_bekerja')->nullable();
            $table->date('tgl_berhenti')->nullable();
            $table->string('no_kontrak')->nullable();
            $table->date('tgl_awal_kontrak')->nullable();
            $table->date('tgl_akhir_kontrak')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('baju')->nullable();
            $table->string('celana')->nullable();
            $table->string('sepatu')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_bpjs_kes')->nullable();
            $table->string('va_bpjs_kes')->nullable();
            $table->string('status_bpjs_kes')->nullable();
            $table->string('ket_bpjs_kes')->nullable();
            $table->string('no_bpjs_tk')->nullable();
            $table->string('va_bpjs_tk')->nullable();
            $table->string('status_bpjs_tk')->nullable();
            $table->string('ket_bpjs_tk')->nullable();
            $table->boolean('wajib_sertifikasi')->default(false);
            $table->string('jurusan')->nullable();
            $table->string('arsip_kontrak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenaga_kerjas', function (Blueprint $table) {
            $table->dropColumn([
                'kelompok', 'region', 'cabang', 'kategori', 'status', 'tgl_masuk',
                'tgl_mulai_bekerja', 'tgl_berhenti', 'no_kontrak', 'tgl_awal_kontrak',
                'tgl_akhir_kontrak', 'jenis_kelamin', 'pendidikan', 'agama',
                'gol_darah', 'status_kawin', 'telepon', 'email', 'alamat_ktp',
                'alamat_domisili', 'no_ktp', 'no_kk', 'nama_ibu_kandung',
                'baju', 'celana', 'sepatu', 'npwp', 'no_bpjs_kes', 'va_bpjs_kes',
                'status_bpjs_kes', 'ket_bpjs_kes', 'no_bpjs_tk', 'va_bpjs_tk',
                'status_bpjs_tk', 'ket_bpjs_tk', 'wajib_sertifikasi', 'jurusan',
                'arsip_kontrak'
            ]);
        });
    }
};
