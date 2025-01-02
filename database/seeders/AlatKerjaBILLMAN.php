<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlatKerjaBILLMAN extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alat_kerjas')->insert([
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Toolkit', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Komputer Ambon', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 60, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => 18, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2026-05-13', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Komputer masohi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 60, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => 18, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2026-05-13', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Komputer Utara dan Tenggara', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 60, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => 18, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2026-05-13', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Smart Phone Ambon', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 38, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -4, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2024-07-22', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Smart Phone masohi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Smart Phone Utara dan Tenggara', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Tongsis Ambon', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Tongsis masohi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Tongsis Utara dan Tenggara', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Powerbank Ambon', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Powerbank masohi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Powerbank Utara dan Tenggara', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Printer Ambon', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Printer masohi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Printer Utara dan Tenggara', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 30, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -12, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2023-11-25', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Jas Hujan', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Sepatu', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Helm', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Rompi', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Name Tag', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'project_id' => 'd26076f0-a24f-4369-a3f2-4d13e3969ec0', 'nama_alat' => 'Payung', 'tgl_kontrak' => '2021-06-08', 'masa_pakai' => 12, 'masa_pakai_saat_ini' => 42, 'sisa_masa_pakai' => -30, 'keterangan' => 'KRONIS', 'tgl_akhir_kontrak' => '2022-06-03', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
