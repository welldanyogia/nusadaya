<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'project_id',
        'unit_pln',
        'penempatan',
        'no_spk',
        'nip',
        'nama',
        'jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'sisa_masa_pensiun',
        'kelompok',
        'region',
        'cabang',
        'kategori',
        'status',
        'tgl_masuk',
        'tgl_mulai_bekerja',
        'tgl_berhenti',
        'no_kontrak',
        'tgl_awal_kontrak',
        'tgl_akhir_kontrak',
        'jenis_kelamin',
        'pendidikan',
        'agama',
        'gol_darah',
        'status_kawin',
        'telepon',
        'email',
        'alamat_ktp',
        'alamat_domisili',
        'no_ktp',
        'no_kk',
        'nama_ibu_kandung',
        'baju',
        'celana',
        'sepatu',
        'npwp',
        'no_bpjs_kes',
        'va_bpjs_kes',
        'status_bpjs_kes',
        'ket_bpjs_kes',
        'no_bpjs_tk',
        'va_bpjs_tk',
        'status_bpjs_tk',
        'ket_bpjs_tk',
        'wajib_sertifikasi',
        'jurusan',
        'arsip_kontrak',
        'no_bpjs_kesehatan',
        'va_bpjs_kesehatan',
        'status_bpjs_kesehatan',
        'ket_bpjs_kesehatan',
        'no_bpjs_tenaga_kerja',
        'va_bpjs_tenaga_kerja',
        'status_bpjs_tenaga_kerja',
        'ket_bpjs_tenaga_kerja',
        'alamat_rumah',
        'email_pribadi',
        'status_kerja',
        'nomor_hp',
        'tanggal_masuk',
        'tanggal_keluar'
    ];

    // Disable auto-incrementing for the ID
    public $incrementing = false;

    // Set the ID type to UUID
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Generate UUID
            }
        });
    }

    // Relation to Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'tenaga_kerja_id');
    }
}
