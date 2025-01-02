<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'category_id' => 1,
                'nama_pekerjaan' => 'LISDES ZONA MALUKU',
                'tanggal_efektif_kontrak' => '2022-06-30',
                'jenis_kontrak' => '',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 184,
                'realisasi_di_lapangan' => 176,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2027-07-31',
                'status_sisa_jangka_waktu_kontrak_bulan' => 35,
                'keterangan' => '',
            ],
            [
                'category_id' => 1,
                'nama_pekerjaan' => 'LISDES ZONA MALUKU UTARA',
                'tanggal_efektif_kontrak' => '2022-06-30',
                'jenis_kontrak' => '',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 147,
                'realisasi_di_lapangan' => 121,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2027-07-31',
                'status_sisa_jangka_waktu_kontrak_bulan' => 35,
                'keterangan' => '',
            ],
            [
                'category_id' => 2,
                'nama_pekerjaan' => 'YANTEK MMU',
                'tanggal_efektif_kontrak' => '2023-04-17',
                'jenis_kontrak' => '',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 772,
                'realisasi_di_lapangan' => 772,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2028-04-30',
                'status_sisa_jangka_waktu_kontrak_bulan' => 44,
                'keterangan' => '',
            ],
            [
                'category_id' => 3,
                'nama_pekerjaan' => 'BILLMAN MMU',
                'tanggal_efektif_kontrak' => '2021-06-08',
                'jenis_kontrak' => 'Volume Based Per Juni 2023',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 355,
                'realisasi_di_lapangan' => 355,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2028-06-30',
                'status_sisa_jangka_waktu_kontrak_bulan' => 46,
                'keterangan' => '',
            ],
            [
                'category_id' => 4,
                'nama_pekerjaan' => 'OPGI UIW MMU',
                'tanggal_efektif_kontrak' => '2023-04-17',
                'jenis_kontrak' => '',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 26,
                'realisasi_di_lapangan' => 26,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2028-04-30',
                'status_sisa_jangka_waktu_kontrak_bulan' => 44,
                'keterangan' => '',
            ],
            [
                'category_id' => 4,
                'nama_pekerjaan' => 'GP UIW MMU',
                'tanggal_efektif_kontrak' => '2023-04-17',
                'jenis_kontrak' => '',
                'jangka_waktu_bulan' => 60,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 16,
                'realisasi_di_lapangan' => 16,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2028-04-30',
                'status_sisa_jangka_waktu_kontrak_bulan' => 44,
                'keterangan' => '',
            ],
            [
                'category_id' => 5,
                'nama_pekerjaan' => 'MANAJEMEN AIL',
                'tanggal_efektif_kontrak' => '2023-07-25',
                'jenis_kontrak' => 'Volume Based',
                'jangka_waktu_bulan' => 12,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 58,
                'realisasi_di_lapangan' => 58,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2024-08-25',
                'status_sisa_jangka_waktu_kontrak_bulan' => 0,
                'keterangan' => '',
            ],
            [
                'category_id' => 5,
                'nama_pekerjaan' => 'DOWNLOADER PLN MOBILE',
                'tanggal_efektif_kontrak' => '2023-07-25',
                'jenis_kontrak' => 'Volume Based',
                'jangka_waktu_bulan' => 12,
                'jumlah_tenaga_kerja_sesuai_kontrak_fix_cost' => 49,
                'realisasi_di_lapangan' => 49,
                'nilai_kontrak_inc_ppn' => 10000000,
                'akhir_kontrak' => '2024-08-25',
                'status_sisa_jangka_waktu_kontrak_bulan' => 0,
                'keterangan' => '',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
