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
        DB::table('alat_kerjas')->insert([
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e616', 'nama_alat' => 'Helm Safety SNI', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e617', 'nama_alat' => 'Kacamata Safety (bening)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e618', 'nama_alat' => 'Sepatu Safety', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e619', 'nama_alat' => 'Pakaian Seragam', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e620', 'nama_alat' => 'Jas Hujan', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e621', 'nama_alat' => 'HP Android', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36,  'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e622', 'nama_alat' => 'ID Card', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 12,  'sisa_masa_pakai' => -8, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e623', 'nama_alat' => 'Finger Print', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36,  'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e624', 'nama_alat' => 'Kuota Internet', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1,  'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e625', 'nama_alat' => 'Thermo Vision', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e626', 'nama_alat' => 'Tang Ampere AC-DC / power clamp meter', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e627', 'nama_alat' => '(AVO Meter) - Digital Kiyoritsu', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e628', 'nama_alat' => 'Gerinda Battere', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e629', 'nama_alat' => 'Bor maksimal 10mm', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e630', 'nama_alat' => 'Groundcluster', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e631', 'nama_alat' => 'Groundcluster 150 kV', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e632', 'nama_alat' => 'Insulating tester 500 V -5.000 V digital (setara Ky 3125)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e633', 'nama_alat' => 'Clamp Earth Tester', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e634', 'nama_alat' => 'Loker 12 Kotak', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e635', 'nama_alat' => 'Battery Compression Dies - 0-400 mm', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 50,  'sisa_masa_pakai' => 30, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e636', 'nama_alat' => 'Tool Set Elektrik', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 60,  'sisa_masa_pakai' => 40, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e637', 'nama_alat' => 'Lampu Sorot', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 24,  'sisa_masa_pakai' => 4, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e638', 'nama_alat' => 'Mobil Operasional (Menggunakan Kendaraan PLN)', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1,  'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e639', 'nama_alat' => 'Notebook Kerja + Printer Koordinator/Pengawas K3', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36,  'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e640', 'nama_alat' => 'ATK', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 1,  'sisa_masa_pakai' => -19, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-04-17', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'b6d878ed-57ba-45dd-9365-55463468e641', 'nama_alat' => 'HT', 'tgl_kontrak' => '2023-04-17', 'masa_pakai' => 36,  'sisa_masa_pakai' => 16, 'keterangan' => 'NORMAL', 'tgl_akhir_kontrak' => '2023-04-17', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
