<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\table;

class AlatKerjaPGP extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectId = DB::table('projects')->where('nama_pekerjaan', 'GP UIW MMU')->value('id');

        // Pastikan project_id ditemukan sebelum insert
        if (!$projectId) {
            throw new \Exception('Project dengan nama tersebut tidak ditemukan di database.');
        }
        DB::table('alat_kerjas')->insert([
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Sepatu Safety dan Boots 6 th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 16, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'teropong Binocular 6th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Waterproof Case HP 6th 3x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Smartphone + Power Bank U/ Srintami 6th 3x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Parang dan Arit Tebas Baja 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'BBM Kendaraan per 2x kmr 6 th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 7, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -13, 'keterangan' => 'BAHAYA', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Helm Pengaman standard SNI 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 16, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Jas Hujan 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 16, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Ransel 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'ID Card 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 16, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'ATK (kertas check list dan ballpoint) 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 4, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -16, 'keterangan' => 'KRITIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Kacamata Safety 6th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 16, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Tali karmantel 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 5, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -15, 'keterangan' => 'KRITIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Ranging meter 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Tirfor 2,5 ton dan sling 8 mm 200 meter 6 th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Sewa Trail 6 th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 7, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -13, 'keterangan' => 'BAHAYA', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Alat ukur pentanahan 6 th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 6, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -14, 'keterangan' => 'KRITIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Alat semprot hama 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 6, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -14, 'keterangan' => 'KRITIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Racun tanaman 1 th 12 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Chainsaw 25 inch+Rantai Cadang 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 7, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -13, 'keterangan' => 'BAHAYA', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Chainsaw 14 inch+Rantai Cadang 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 7, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -13, 'keterangan' => 'BAHAYA', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Full Body Harness & Double Lanyard 6 th 3 x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 7, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -13, 'keterangan' => 'BAHAYA', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Peningkatan Kompetensi 6 th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 0, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -20, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Medical Check Up 6 th 6x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 0, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -20, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'SPPD', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 0, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -20, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
        ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'GPS 6th 2x', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
