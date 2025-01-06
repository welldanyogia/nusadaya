<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenagaKerjaOPGI extends Seeder
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
        DB::table('tenaga_kerjas')->insert([
            [ 'id' => '48d111eb-67ce-43e5-b13a-ccbfe82c80fa', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KASTELA', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '90220521ABN', 'nama' => 'ANDI KADIRI', 'usia' => '34', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'BANDA', 'tanggal_lahir' => '1990-05-01', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'SANGAJI UTARA, KOTA TERNATE TENGAH', 'alamat_domisili' => 'DUSUN DUROA,  DULLAH UTARA', 'no_ktp' => '8271030105900000', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '606070399942000', 'no_bpjs_kes' => '8271030105900000', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => '20026860070', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'f116208e-e897-4867-bd8f-e3df0621fe22', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KASTELA', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '97220522ABN', 'nama' => 'HASRI ANDI', 'usia' => '27', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'TERNATE', 'tanggal_lahir' => '1997-03-10', 'pendidikan' => 'SMK', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'KEL MARIKURUBU,  KOTA TERNATE TENGAH, KOTA TERNATE', 'alamat_domisili' => 'DUSUN DUROA,  DULLAH UTARA', 'no_ktp' => '8271021003970000', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '914722046942000', 'no_bpjs_kes' => '8271021003970000', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => '17036895369', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '036d1549-c26a-46a0-95d3-0c0563cef0eb', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KASTELA', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '95220525ABN', 'nama' => 'RIKO MOHTAR', 'usia' => '29', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'TERNATE', 'tanggal_lahir' => '1995-06-12', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'JL.OSCAR,SANGAJI UTARA, KOTA TERNATE UTARA', 'alamat_domisili' => 'TAYANDO YAMRU, TAYANDO YAMRU TAYANDO TAM KOTA TUAL', 'no_ktp' => '8271031206960000', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '909752073942000', 'no_bpjs_kes' => '000 2757372849', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '21008659597', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '4a0ec938-7073-4c8b-86d1-9cadb72aa4d4', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KASTELA', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '00241952ABN', 'nama' => 'ERHIL ABRIANSYAH AZIS', 'usia' => '23', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2024-07-25', 'tgl_mulai_bekerja' => '2024-07-25', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2024-07-25', 'tgl_akhir_kontrak' => '2025-07-25', 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'KABUPATEN BULUKUMBA', 'tanggal_lahir' => '2000-10-05', 'pendidikan' => 'D4-DIPLOMA IV', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '89518058010', 'email' => 'ERHILABRIANSYAH@GMAIL.COM', 'alamat_ktp' => 'BONTOBEANG, KEL. BONTOKAMASE, KEC. HERLANG, KEL. BONTO KAMASE, KEC. HERO LANGE-LANGE, KABUPATEN BULUKUMBA, SULAWESI SELATAN - 92573', 'alamat_domisili' => 'JL. SULING RAYA NO. 1 BLOK G PERUMNAS ANTANG, MANGGALA, KEL. ANTANG, KEC. MANGGALA, KOTA MAKASSAR, SULAWESI SELATAN - 90234', 'no_ktp' => '7302050510000003', 'no_kk' => '7302050106070044', 'nama_ibu_kandung' => 'RAMLIA', 'baju' => 'L', 'celana' => '32', 'sepatu' => '42', 'npwp' => '627878218805000', 'no_bpjs_kes' => '0001855276007', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'BELUM AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => null, 'va_bpjs_tk' => 'BELUM AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'TEKNIK ELEKTRO', 'arsip_kontrak' => 'TIDAK ADA' ],
            [ 'id' => 'b675a19c-b51d-4f95-beba-7f0efb1599f6', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KAYU MERAH', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '85220520ABN', 'nama' => 'ABD RAHMAT S MARJAT', 'usia' => '38', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'TERNATE', 'tanggal_lahir' => '1985-11-14', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'KEL,MALIARO, KOTA TERNATE TENGAH, KOTA TERNATE', 'alamat_domisili' => 'LIG. MARIA MEDIATRIX OHOIBUN BARAT, LANGGUR KEI KECIL MALUKU TENGGARA', 'no_ktp' => '8271061411950000', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '916142060942000', 'no_bpjs_kes' => '8271061411950000', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => '18055871984', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'ccb15680-7a1f-4255-816b-aff8f7e299d6', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KAYU MERAH', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '93220523ABN', 'nama' => 'HARIS DJABIR', 'usia' => '31', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'TERNATE', 'tanggal_lahir' => '1993-07-04', 'pendidikan' => 'S1 TEKNIK INFORMATIKA', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'SABIA, SANGAJI UTARA, KOTA TERNATE UTARA', 'alamat_domisili' => 'JL DIHIR, KETSOBLAK PULAU DULLAH SELATAN KOTA TUAL', 'no_ktp' => '8271030407930000', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '917012510942000', 'no_bpjs_kes' => '8271030407930000', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => '19048438154', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '37001e4a-edaa-45de-bc06-ed37ad333987', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KAYU MERAH', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '91220526ABN', 'nama' => 'NUR KASIANI PRADITA RIA', 'usia' => '33', 'jabatan' => 'KOORDINATOR OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'PEREMPUAN', 'tempat_lahir' => 'SANANA', 'tanggal_lahir' => '1991-06-21', 'pendidikan' => 'S1 KESMAS', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'JL. STADION 008/04 NO. 421, KOTA TERNATE TENGAH', 'alamat_domisili' => 'DESA FAAN, DESA FAAN KEI KECIL MALUKU TENGGARA', 'no_ktp' => '8271066106910002.00', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '753505015942000', 'no_bpjs_kes' => '8271066106910002.00', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => null, 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'e93e60d5-5677-4a74-b4c0-af5a9ad91faa', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KAYU MERAH', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '83220527ABN', 'nama' => 'MOHAMMAD DANNY REZA TAMIN', 'usia' => '41', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'TERNATE', 'tanggal_lahir' => '1983-06-29', 'pendidikan' => 'SMA IPS', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => 'DHANY297YANNI@GMAIL.COM', 'alamat_ktp' => 'JL. STADION 008/04 KOTA TERNATE TENGAH', 'alamat_domisili' => 'OHOI WEARLILIR,  KEI KECIL MALUKU TENGARA', 'no_ktp' => '8271062906830002.00', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '909802811942000', 'no_bpjs_kes' => '8271062906830002.00', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => null, 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'cc82d602-ea3c-4183-839e-15fc8b33f044', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPK MMU', 'penempatan' => 'GI KAYU MERAH', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '00220528ABN', 'nama' => 'PERDANA KUSUMA LATING', 'usia' => '24', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-08-01', 'tgl_mulai_bekerja' => '2022-08-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-08-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'MAYANG', 'tanggal_lahir' => '2000-08-10', 'pendidikan' => 'D3 TEKNIK MESIN', 'agama' => 'I', 'gol_darah' => null, 'status_kawin' => 'TK0', 'telepon' => null, 'email' => null, 'alamat_ktp' => 'HILA, KOTA AMBON, MALUKU TENGAH', 'alamat_domisili' => 'JL. MUTIARA, GALAI DUBU PP. ARU KEPULAUAN ARU', 'no_ktp' => '810115100800001.00', 'no_kk' => null, 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '617788575941000', 'no_bpjs_kes' => '810115100800001.00', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => 'AKTIF', 'no_bpjs_tk' => null, 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '19e70cfa-0338-4e1e-8591-ca622cee9417', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI HATIVE BESAR', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '95220454ABN', 'nama' => 'FEGRY FREJON APONNO', 'usia' => '29', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'PORTO', 'tanggal_lahir' => '1995-02-02', 'pendidikan' => 'D3', 'agama' => 'P', 'gol_darah' => 'B', 'status_kawin' => 'TK0', 'telepon' => '082248230019', 'email' => 'fegryaponno619@gmail.com', 'alamat_ktp' => 'JL.DR KAYADOE , RT/ 005 RW/ 006, KUDAMATI  NUSANIWE AMBON', 'alamat_domisili' => 'FARMASI ATAS, KUDAMATI  NUSANIWE  AMBON', 'no_ktp' => '8171010202950001', 'no_kk' => '8171012601088996', 'nama_ibu_kandung' => 'SALOMINA LATUPEIRISSA', 'baju' => 'L', 'celana' => '34', 'sepatu' => '41', 'npwp' => '414925784941000', 'no_bpjs_kes' => '0000972641812', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '19086999596', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'P', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '8ccbf1f7-5ad5-49da-86f2-3f485abd9713', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI HATIVE BESAR', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '93220459ABN', 'nama' => 'REXY ATJAS', 'usia' => '30', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1993-10-16', 'pendidikan' => 'SMA', 'agama' => 'K', 'gol_darah' => 'O', 'status_kawin' => 'K1', 'telepon' => '081240889388', 'email' => 'REXYATJAS2066@GMAIL.COM', 'alamat_ktp' => 'BENTENG, NUSANIWE NUSANIWE MALUKU', 'alamat_domisili' => 'HATIVE KECIL, HATIVE KECIL SIRIMAU MALUKU', 'no_ktp' => '8171011610930001', 'no_kk' => '8171012511210005', 'nama_ibu_kandung' => 'BERNADETHA ATJAS', 'baju' => 'L', 'celana' => '34', 'sepatu' => '44', 'npwp' => '986386118941000', 'no_bpjs_kes' => '0002074114809', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '19043047190', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'K', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'ab1dbc2e-6543-41ff-a9b5-09e2f665a8cd', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI HATIVE BESAR', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '92220464ABN', 'nama' => 'WILLIAM DHARMA PUTRA LOMO', 'usia' => '31', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'SAPARUA', 'tanggal_lahir' => '1992-11-05', 'pendidikan' => 'SMA', 'agama' => 'P', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '', 'email' => 'WILLIAMLOMO42@GMAIL.COM', 'alamat_ktp' => 'BENTENG ATAS, NUSANIWE NUSANIWE MALUKU', 'alamat_domisili' => 'AIR SALOBAR, NUSANIWE NUSANIWE MALUKU', 'no_ktp' => '8171011105920001', 'no_kk' => '8171010801210009', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '856240635841000', 'no_bpjs_kes' => '0002297985276', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '17047864669', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'P', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '5e20ed61-784f-42bf-8c8d-edcbc8aa8194', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI HATIVE BESAR', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '87220467ABN', 'nama' => 'YONGKI YOHANIS WATTIMENA', 'usia' => '36', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'SERI', 'tanggal_lahir' => '1987-09-30', 'pendidikan' => 'SMK', 'agama' => 'P', 'gol_darah' => 'O', 'status_kawin' => 'K3', 'telepon' => '082312057812', 'email' => 'WATTIMENAYONGKI30@GMAIL.COM', 'alamat_ktp' => 'DUSUN SERI RT/ RW : 005/003, URIMESSING NUSANIWE KOTA AMBON', 'alamat_domisili' => 'DUSUN SERI, URIMESSING NUSANIWE KOTA AMBON', 'no_ktp' => '8171013009870004', 'no_kk' => '8171012708190011', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '915394290941000', 'no_bpjs_kes' => '0002277444587', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '17047864529', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'P', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '78933d57-584b-4ea2-8cb1-61c0f185115a', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI PASSO', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '96220455ABN', 'nama' => 'FIKRI A ATTAMIMI', 'usia' => '28', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1996-05-26', 'pendidikan' => 'S1', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '085254241201', 'email' => 'FIIKYUUU@GMAIL.COM', 'alamat_ktp' => 'BATU MERAH PUNCAK, BATU MERAH SIRIMAU AMBON', 'alamat_domisili' => 'GALUNGGUNG, BATU MERAH PUNCAK, BATU MERAH SIRIMAU AMBON', 'no_ktp' => '8171022605960006', 'no_kk' => '8171020406100023', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '431091396941000', 'no_bpjs_kes' => '0000153011902', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '20055272114', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'f1e4cf45-624d-41c8-bce7-c3feeb76182b', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI PASSO', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '94220457ABN', 'nama' => 'LUKMAN BUTON', 'usia' => '29', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'ILATH', 'tanggal_lahir' => '1994-10-07', 'pendidikan' => 'D3', 'agama' => 'I', 'gol_darah' => 'B', 'status_kawin' => 'TK0', 'telepon' => '082246698203', 'email' => 'LUKMANBUTON298@GMAIL.COM', 'alamat_ktp' => 'DUSUN WAIHANI, ILATH BATABUAL BURU', 'alamat_domisili' => 'KOTA JAWA, DESA RUMAH TIGA TELUK AMBON AMBON', 'no_ktp' => '8104100709940003', 'no_kk' => '8104102810130001', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '431267707941000', 'no_bpjs_kes' => '0002922705764', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '20028177945', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'edb8a818-6abb-4060-8386-566e9d97ffd9', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI PASSO', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '93220463ABN', 'nama' => 'UTOMO BUDI SETIAWAN LOILATU', 'usia' => '31', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1993-05-20', 'pendidikan' => 'S1', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '082239115045', 'email' => 'UTOMOLOILATU@GMAIL.COM', 'alamat_ktp' => 'LORONG MASJID ANSHOR, BATU MERAH SIRIMAU AMBON', 'alamat_domisili' => 'LORONG BATU TAGEPE, BATU MERAH SIRIMAU AMBON', 'no_ktp' => '8171012005930005', 'no_kk' => '8171021306160003', 'nama_ibu_kandung' => 'FATMAH POLPOKE', 'baju' => 'L', 'celana' => '30', 'sepatu' => '40', 'npwp' => '915584171941000', 'no_bpjs_kes' => '0000205778845', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '19043047091', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '21b6f492-8b59-4eda-9377-823639459276', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI PASSO', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '87220468ABN', 'nama' => 'ANDI SUKARDI', 'usia' => '37', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1987-06-17', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => 'B', 'status_kawin' => 'K1', 'telepon' => '082248478693', 'email' => 'ANDISUKARDI734@MAIL.COM', 'alamat_ktp' => 'BATU MERAH, BATU MERAH SIRIMAU MALUKU', 'alamat_domisili' => 'GALUNGGUNG, BATU MERAH SIRIMAU MALUKU', 'no_ktp' => '8171021706880001', 'no_kk' => '8171020603180018', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '856791991941000', 'no_bpjs_kes' => '0000972449065', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '22098026952', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => null, 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'cdb788c7-0771-477e-8521-ede265d181d8', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI SIRIMAU', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '86220453ABN', 'nama' => 'ELPHIS JULIUS KAINAMA', 'usia' => '38', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1986-05-12', 'pendidikan' => 'S1', 'agama' => 'P', 'gol_darah' => 'O', 'status_kawin' => 'K1', 'telepon' => '082248143255', 'email' => 'ELPHISJULIUS29@GMAIL.COM', 'alamat_ktp' => 'AIR SALOBAR, NUSANIWE NUSANIWE AMBON', 'alamat_domisili' => 'AIR SALOBAR, NUSANIWE NUSANIWE AMBON', 'no_ktp' => '8171012907860001', 'no_kk' => '8171010407140004', 'nama_ibu_kandung' => 'WIENDRATI SOEROSO', 'baju' => 'XXL', 'celana' => null, 'sepatu' => null, 'npwp' => '719312605941000', 'no_bpjs_kes' => null, 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '22098026994', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'P', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'e8cd32a7-78f9-4993-8659-da1194de396a', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI SIRIMAU', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '00220456ABN', 'nama' => 'GIBRAN ANUGRAH ASWAD', 'usia' => '23', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '2000-11-12', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '085244244985', 'email' => 'GIBRANMALAWAT46@GMAIL.COM', 'alamat_ktp' => 'JL.DR.SITANALA, WAINITU NUSANIWE KOTA AMBON', 'alamat_domisili' => 'JLN DR SITANALA (TALAKE), WAINITU NUSANIWE KOTA AMBON', 'no_ktp' => '8171011211000009', 'no_kk' => '8171012312090012', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '431360221941000', 'no_bpjs_kes' => '0002480903087', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '22098026903', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'e18dd34e-6418-4fbd-84e0-5d4feaa98816', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI SIRIMAU', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '95220458ABN', 'nama' => 'MUHAMMAD ALI SALAMPESSY', 'usia' => '29', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'PELAUW', 'tanggal_lahir' => '1995-09-17', 'pendidikan' => 'SMA', 'agama' => 'I', 'gol_darah' => '-', 'status_kawin' => 'K2', 'telepon' => '081248794990', 'email' => 'LIKENSTUSSY93@GMAIL.COM', 'alamat_ktp' => 'KEBUN CENGKEH , BATU MERAH  SIRIMAU  AMBON', 'alamat_domisili' => 'KEBUN CENGKEH , BATU MERAH  SIRIMAU  AMBON', 'no_ktp' => '8171021709950008', 'no_kk' => '8171020803210028', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '857282412941000', 'no_bpjs_kes' => '0002277461182', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '17047864503', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '8b29fb39-93ba-4789-ba61-c8afb49fd57b', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI WAAI', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '94220462ABN', 'nama' => 'SAMANRESI RIJOLI', 'usia' => '30', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'WAIPIA', 'tanggal_lahir' => '1994-05-05', 'pendidikan' => 'D3', 'agama' => 'P', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '082199154035', 'email' => 'SAMANRESI4@GMAIL.COM', 'alamat_ktp' => 'LAYENI, LAYENI TEON NILA SERUA MALUKU TENGAH', 'alamat_domisili' => 'SULI, LATUSLAMU SALAHUTU MALUKU TENGAH', 'no_ktp' => '8101020505940003', 'no_kk' => '8101021606170002', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '414304980941000', 'no_bpjs_kes' => '0002900045665', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '19076090505', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'P', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => 'cc6a0b08-7773-4b77-bef3-c04f587cdb50', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI WAAI', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '99220465ABN', 'nama' => 'YAMAN BACHTIAR PABETTAI', 'usia' => '24', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2022-07-01', 'tgl_mulai_bekerja' => '2022-07-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2022-07-01', 'tgl_akhir_kontrak' => null, 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'BONE', 'tanggal_lahir' => '1999-10-31', 'pendidikan' => 'SMK', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '085254628050', 'email' => 'BACHTIARYAMAN7@.GMAIL.COM', 'alamat_ktp' => 'NANIA, NANIA BAGUALA KOTA AMBON', 'alamat_domisili' => 'NANIA, NANIA BAGUALA KOTA AMBON', 'no_ktp' => '8171033110990003', 'no_kk' => '817103081220005', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '431222033941000', 'no_bpjs_kes' => '0002047074399', 'va_bpjs_kes' => null, 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => '22098027042', 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'I', 'arsip_kontrak' => 'ADA' ],
            [ 'id' => '974eb1b4-47ea-4b40-a52c-401d09c9dfbb', 'project_id' => $projectId, 'kelompok' => 'TEKNIK', 'region' => 'REGION MALUKU', 'cabang' => 'CABANG MALUKU', 'unit_pln' => 'PT. PLN (PERSERO) UPT AMBON', 'penempatan' => 'GI WAAI', 'kategori' => 'PEMBANGKITAN', 'status' => 'PKWTT', 'no_spk' => '0021.Pj/DAN.01.03/F17000000/2023', 'nip' => '97230841ABN', 'nama' => 'FAUZAN MUSLIM', 'usia' => '27', 'jabatan' => 'OPERATOR GI', 'tgl_masuk' => '2023-05-01', 'tgl_mulai_bekerja' => '2023-05-01', 'tgl_berhenti' => null, 'no_kontrak' => null, 'tgl_awal_kontrak' => '2023-05-01', 'tgl_akhir_kontrak' => '2025-04-30', 'jenis_kelamin' => 'LAKI-LAKI', 'tempat_lahir' => 'AMBON', 'tanggal_lahir' => '1997-04-07', 'pendidikan' => 'SMK', 'agama' => 'I', 'gol_darah' => 'O', 'status_kawin' => 'TK0', 'telepon' => '082249046074', 'email' => 'FAUZANBANDU7@GMAIL.COM', 'alamat_ktp' => 'PROVINSI MALUKU, KOTA AMBON, KECAMATAN BAGUALA,DESA NANIA,RT002/RW001, NANIA BAGUALA -', 'alamat_domisili' => 'PROVINSI MALUKU, KOTA AMBON, KECAMATAN BAGUALA,DESA NANIA,RT002/RW001, NANIA BAGUALA -', 'no_ktp' => '8171030707970004', 'no_kk' => '8171032601082621', 'nama_ibu_kandung' => null, 'baju' => null, 'celana' => null, 'sepatu' => null, 'npwp' => '431359199941000', 'no_bpjs_kes' => '8171030707970004', 'va_bpjs_kes' => '03592749', 'status_bpjs_kes' => 'AKTIF', 'ket_bpjs_kes' => null, 'no_bpjs_tk' => null, 'va_bpjs_tk' => 'AKTIF', 'ket_bpjs_tk' => null, 'wajib_sertifikasi' => 1, 'jurusan' => 'TEKNIK INSTALASI TENAGA LISTRIK(TITL)', 'arsip_kontrak' => 'TIDAK ADA' ],
        ]);
    }
}
