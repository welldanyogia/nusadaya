<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlatKerjaOPGI extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectId = DB::table('projects')->where('nama_pekerjaan', 'OPGI UIW MMU')->value('id');

        // Pastikan project_id ditemukan sebelum insert
        if (!$projectId) {
            throw new \Exception('Project dengan nama tersebut tidak ditemukan di database.');
        }
        DB::table('alat_kerjas')->insert([
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Helm Safety SNI', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Kacamata Safety (bening)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Sepatu Safety', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Pakaian Seragam', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Jas Hujan', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'HP Android', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'ID Card', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Finger Print', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Kuota Internet', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Thermo Vision', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Tang Ampere AC-DC / power clamp meter', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => '(AVO Meter) - Digital Kiyoritsu', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Gerinda Battere', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Bor maksimal 10mm', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Groundcluster', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Groundcluster 150 kV', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Insulating tester 500 V -5.000 V digital (setara Ky 3125)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Clamp Earth Tester', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Loker 12 Kotak', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Battery Compression Dies - 0-400 mm', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Tool Set Elektrik', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 60, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 40, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Lampu Sorot', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 24, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Mobil Operasional (Menggunakan Kendaraan PLN)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'Notebook Kerja + Printer Koordinator/Pengawas K3', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'ATK', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => $projectId, 'nama_alat' => 'HT', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36, 'masa_pakai_saat_ini' => 20, 'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
