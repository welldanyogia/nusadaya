const payments = [
    {
        id: "728ed52f",
        amount: 100,
        status: "pending",
        email: "m@example.com",
    },
    {
        id: "489e1d42",
        amount: 125,
        status: "processing",
        email: "example@gmail.com",
    },
    // Add more payments as needed
];

export async function getData() {
    // Fetch data from your API here.
    return [
        {
            category: "PEMBANGKIT",
            nama_pekerjaan: "LISDES ZONA MALUKU",
            tanggal_efektif_kontrak: "30-Jun-22",
            jenis_kontrak: "",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 184,
            realisasi_di_lapangan: 176,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "31-Jul-27",
            status_sisa_jangka_waktu_kontrak_bulan: 36,
            keterangan: ""
        },
        {
            category: "PEMBANGKIT",
            nama_pekerjaan: "LISDES ZONA MALUKU UTARA",
            tanggal_efektif_kontrak: "30-Jun-22",
            jenis_kontrak: "",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 147,
            realisasi_di_lapangan: 121,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "31-Jul-27",
            status_sisa_jangka_waktu_kontrak_bulan: 36,
            keterangan: ""
        },
        {
            category: "DISTRIBUSI",
            nama_pekerjaan: "YANTEK MMU",
            tanggal_efektif_kontrak: "17-Apr-23",
            jenis_kontrak: "",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 772,
            realisasi_di_lapangan: 772,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "30-Apr-28",
            status_sisa_jangka_waktu_kontrak_bulan: 45,
            keterangan: ""
        },
        {
            category: "PELAYANAN PELANGGAN",
            nama_pekerjaan: "BILLMAN MMU",
            tanggal_efektif_kontrak: "08-Jun-21",
            jenis_kontrak: "Volume Based Per Juni 2023",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 355,
            realisasi_di_lapangan: 355,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "30-Jun-28",
            status_sisa_jangka_waktu_kontrak_bulan: 47,
            keterangan: ""
        },
        {
            category: "TRANSMISI",
            nama_pekerjaan: "OPGI UIW MMU",
            tanggal_efektif_kontrak: "17-Apr-23",
            jenis_kontrak: "",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 26,
            realisasi_di_lapangan: 26,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "30-Apr-28",
            status_sisa_jangka_waktu_kontrak_bulan: 45,
            keterangan: ""
        },
        {
            category: "TRANSMISI",
            nama_pekerjaan: "GP UIW MMU",
            tanggal_efektif_kontrak: "17-Apr-23",
            jenis_kontrak: "",
            jangka_waktu_bulan: 60,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 16,
            realisasi_di_lapangan: 16,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "30-Apr-28",
            status_sisa_jangka_waktu_kontrak_bulan: 45,
            keterangan: ""
        },
        {
            category: "AIL DOWNLOADER",
            nama_pekerjaan: "MANAJEMEN AIL",
            tanggal_efektif_kontrak: "25-Jul-23",
            jenis_kontrak: "Volume Based",
            jangka_waktu_bulan: 12,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 58,
            realisasi_di_lapangan: 58,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "25 Agustus 2024",
            status_sisa_jangka_waktu_kontrak_bulan: 1,
            keterangan: ""
        },
        {
            category: "AIL DOWNLOADER",
            nama_pekerjaan: "DOWNLOADER PLN MOBILE",
            tanggal_efektif_kontrak: "25-Jul-23",
            jenis_kontrak: "Volume Based",
            jangka_waktu_bulan: 12,
            jumlah_tenaga_kerja_sesuai_kontrak_fix_cost: 49,
            realisasi_di_lapangan: 49,
            nilai_kontrak_inc_ppn: 10000000,
            akhir_kontrak: "25 Agustus 2024",
            status_sisa_jangka_waktu_kontrak_bulan: 1,
            keterangan: ""
        }
    ];
}
