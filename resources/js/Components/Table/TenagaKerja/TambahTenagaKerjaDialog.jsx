import { Button } from "@/Components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/Components/ui/dialog";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { ProjectComboBox } from "@/Components/Table/AlatKerja/ProjectComboBox.jsx";
import { useState } from "react";
import { useForm } from "@inertiajs/react";
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from "@/Components/ui/select.jsx"; // Import Inertia useForm

export function TambahTenagaKerjaDialog({ projects }) {
    const [open, setOpen] = useState(false); // State untuk mengatur buka/tutup dialog
    const { data, setData, post, reset, errors } = useForm({
        nama: "",
        jabatan: "",
        nip: "",
        tempat_lahir: "",
        tgl_lahir: "",
        project_id: "",
        unit_pln: "",
        penempatan: "",
        no_spk: "",
        agama: "",
        usia: "",
        sisa_masa_pensiun: "",
        kelompok: "",
        region: "",
        cabang: "",
        kategori: "",
        status: "",
        tgl_masuk: "",
        tgl_mulai_bekerja: "",
        tgl_berhenti: "",
        no_kontrak: "",
        tgl_awal_kontrak: "",
        tgl_akhir_kontrak: "",
        jenis_kelamin: "",
        pendidikan: "",
        gol_darah: "",
        status_kawin: "",
        telepon: "",
        email: "",
        alamat_ktp: "",
        alamat_domisili: "",
        no_ktp: "",
        no_kk: "",
        nama_ibu_kandung: "",
        baju: "",
        celana: "",
        sepatu: "",
        npwp: "",
        no_bpjs_kes: "",
        va_bpjs_kes: "",
        status_bpjs_kes: "",
        ket_bpjs_kes: "",
        no_bpjs_tk: "",
        va_bpjs_tk: "",
        status_bpjs_tk: "",
        ket_bpjs_tk: "",
        wajib_sertifikasi: "",
        jurusan: "",
    });



    const handleProjectChange = (projectId) => {
        if (projectId) {
            setData((prevData) => ({
                ...prevData,
                project_id: projectId,
            }));
        }
    };

    // Handler untuk submit form
    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("tenagakerja.store"), {
            onSuccess: () => {
                reset(); // Reset form setelah sukses
                setOpen(false); // Tutup dialog setelah pengiriman berhasil
            },
        });
    };

    return (
        <Dialog open={open} onOpenChange={setOpen}> {/* Atur open dan setOpen untuk mengontrol dialog */}
            <DialogTrigger asChild>
                <Button
                    variant="outline"
                    className={"bg-fountain-blue-400 text-white rounded-xl"}
                    onClick={() => setOpen(true)} // Buka dialog saat tombol di klik
                >
                    Tambah Tenaga Kerja
                </Button>
            </DialogTrigger>
            <DialogContent className="mx-auto max-w-screen-md max-h-screen overflow-y-auto max-sm:max-w-[370px] max-sm:max-h-screen max-sm:overflow-y-auto max-sm:my-4 text-fountain-blue-400">
                <DialogHeader>
                    <DialogTitle className={"text-fountain-blue-400"}>Tambah Tenaga Kerja</DialogTitle>
                    <DialogDescription>
                        Isi formulir di bawah ini untuk menambahkan tenaga kerja baru. Klik simpan setelah selesai.
                    </DialogDescription>
                </DialogHeader>
                <form onSubmit={handleSubmit}>
                    <div className="grid gap-4 py-4 overflow-y-auto max-sm:overflow-y-auto">
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="nama" className="text-right">Nama</Label>
                            <Input
                                id="nama"
                                value={data.nama}
                                onChange={(e) => setData("nama", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.nama && <span className="text-red-500 col-span-4 text-xs">{errors.nama}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="jabatan" className="text-right">Jabatan</Label>
                            <Input
                                id="jabatan"
                                value={data.jabatan}
                                onChange={(e) => setData("jabatan", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.jabatan &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.jabatan}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="nip" className="text-right">NIP</Label>
                            <Input
                                id="nip"
                                value={data.nip}
                                onChange={(e) => setData("nip", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.nip && <span className="text-red-500 col-span-4 text-xs">{errors.nip}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tempat_lahir" className="text-right">Tempat Lahir</Label>
                            <Input
                                id="tempat_lahir"
                                value={data.tempat_lahir}
                                onChange={(e) => setData("tempat_lahir", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.tempat_lahir &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tempat_lahir}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tgl_lahir" className="text-right">Tanggal Lahir</Label>
                            <Input
                                id="tgl_lahir"
                                type="date"
                                value={data.tgl_lahir}
                                onChange={(e) => setData("tgl_lahir", e.target.value)}
                                className="col-span-3 w-fit text-neutral-600"
                            />
                            {errors.tgl_lahir &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tgl_lahir}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="project" className="text-right">Proyek</Label>
                            <ProjectComboBox
                                projects={projects}
                                onProjectChange={handleProjectChange}
                            />
                            {errors.project_id &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.project_id}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="unit_pln" className="text-right">Unit PLN</Label>
                            <Input
                                id="unit_pln"
                                value={data.unit_pln}
                                onChange={(e) => setData("unit_pln", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.unit_pln &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.unit_pln}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="penempatan" className="text-right">Penempatan</Label>
                            <Input
                                id="penempatan"
                                value={data.penempatan}
                                onChange={(e) => setData("penempatan", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.penempatan &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.penempatan}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_spk" className="text-right">No SPK</Label>
                            <Input
                                id="no_spk"
                                value={data.no_spk}
                                onChange={(e) => setData("no_spk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_spk && <span className="text-red-500 col-span-4 text-xs">{errors.no_spk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="agama" className="text-right">Agama</Label>
                            <Input
                                id="agama"
                                value={data.agama}
                                onChange={(e) => setData("agama", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.agama && <span className="text-red-500 col-span-4 text-xs">{errors.agama}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="kelompok" className="text-right">Kelompok</Label>
                            <Input
                                id="kelompok"
                                value={data.kelompok}
                                onChange={(e) => setData("kelompok", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.kelompok &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.kelompok}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="region" className="text-right capitalize">region</Label>
                            <Input
                                id="region"
                                value={data.region}
                                onChange={(e) => setData("region", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.region &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.region}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="cabang" className="text-right capitalize">cabang</Label>
                            <Input
                                id="cabang"
                                value={data.cabang}
                                onChange={(e) => setData("cabang", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.cabang &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.cabang}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="kategori" className="text-right capitalize">kategori</Label>
                            <Input
                                id="kategori"
                                value={data.kategori}
                                onChange={(e) => setData("kategori", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.kategori &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.kategori}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="status" className="text-right capitalize">status</Label>
                            <Input
                                id="status"
                                value={data.status}
                                onChange={(e) => setData("status", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.status &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.status}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tgl_masuk" className="text-right capitalize">Tanggal Masuk</Label>
                            <Input
                                type={'date'}
                                id="tgl_masuk"
                                value={data.tgl_masuk}
                                onChange={(e) => setData("tgl_masuk", e.target.value)}
                                className="col-span-3 w-fit text-neutral-600"
                            />
                            {errors.tgl_masuk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tgl_masuk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tgl_mulai_bekerja" className="text-right capitalize">Tanggal Mulai
                                Bekerja</Label>
                            <Input
                                type={'date'}
                                id="tgl_mulai_bekerja"
                                value={data.tgl_mulai_bekerja}
                                onChange={(e) => setData("tgl_mulai_bekerja", e.target.value)}
                                className="col-span-3 w-fit text-neutral-600"
                            />
                            {errors.tgl_mulai_bekerja &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tgl_mulai_bekerja}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_kontrak" className="text-right capitalize">No Kontrak</Label>
                            <Input
                                id="no_kontrak"
                                value={data.no_kontrak}
                                onChange={(e) => setData("no_kontrak", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_kontrak &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.no_kontrak}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tgl_awal_kontrak" className="text-right capitalize">Tanggal Awal
                                Kontrak</Label>
                            <Input
                                type={'date'}
                                id="tgl_awal_kontrak"
                                value={data.tgl_awal_kontrak}
                                onChange={(e) => setData("tgl_awal_kontrak", e.target.value)}
                                className="col-span-3 w-fit text-neutral-600"
                            />
                            {errors.tgl_awal_kontrak &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tgl_awal_kontrak}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="tgl_akhir_kontrak" className="text-right capitalize">Tanggal Akhir
                                Kontrak</Label>
                            <Input
                                type={'date'}
                                id="tgl_akhir_kontrak"
                                value={data.tgl_akhir_kontrak}
                                onChange={(e) => setData("tgl_akhir_kontrak", e.target.value)}
                                className="col-span-3 w-fit text-neutral-600"
                            />
                            {errors.tgl_akhir_kontrak &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.tgl_akhir_kontrak}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="jenis_kelamin" className="text-right capitalize">Jenis Kelamin</Label>
                            <Input
                                id="jenis_kelamin"
                                value={data.jenis_kelamin}
                                onChange={(e) => setData("jenis_kelamin", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.jenis_kelamin &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.jenis_kelamin}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="pendidikan" className="text-right capitalize">Pendidikan</Label>
                            <Input
                                id="pendidikan"
                                value={data.pendidikan}
                                onChange={(e) => setData("pendidikan", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.pendidikan &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.pendidikan}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="jurusan" className="text-right capitalize">jurusan</Label>
                            <Input
                                id="jurusan"
                                value={data.jurusan}
                                onChange={(e) => setData("jurusan", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.jurusan &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.jurusan}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="gol_darah" className="text-right capitalize">golongan darah</Label>
                            <Input
                                id="gol_darah"
                                value={data.gol_darah}
                                onChange={(e) => setData("gol_darah", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.gol_darah &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.gol_darah}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="status_kawin" className="text-right capitalize">Status Kawin</Label>
                            <Input
                                id="status_kawin"
                                value={data.status_kawin}
                                onChange={(e) => setData("status_kawin", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.status_kawin &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.status_kawin}</span>}
                        </div>
                        {/*<div className="grid grid-cols-4 items-center gap-4">*/}
                        {/*    <Label htmlFor="status_kawin" className="text-right capitalize">Status Kawin</Label>*/}
                        {/*    <Input*/}
                        {/*        id="status_kawin"*/}
                        {/*        value={data.status_kawin}*/}
                        {/*        onChange={(e) => setData("status_kawin", e.target.value)}*/}
                        {/*        className="col-span-3 text-neutral-600"*/}
                        {/*    />*/}
                        {/*    {errors.status_kawin &&*/}
                        {/*        <span className="text-red-500 col-span-4 text-xs">{errors.status_kawin}</span>}*/}
                        {/*</div>*/}
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="telepon" className="text-right capitalize">Telepon</Label>
                            <Input
                                type={'tel'}
                                onInput={(e) => {
                                    // Menghapus karakter non-digit
                                    e.target.value = e.target.value.replace(/\D/g, "");
                                }}
                                id="telepon"
                                value={data.telepon}
                                onChange={(e) => setData("telepon", e.target.value)}
                                className="col-span-3 text-neutral-600"
                                pattern="^\d{10,}$"
                            />
                            {errors.telepon &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.telepon}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="email" className="text-right capitalize">email</Label>
                            <Input
                                type={'email'}
                                id="email"
                                value={data.email}
                                onChange={(e) => setData("email", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.email &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.email}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="alamat_ktp" className="text-right capitalize">alamat ktp</Label>
                            <Input
                                id="alamat_ktp"
                                value={data.alamat_ktp}
                                onChange={(e) => setData("alamat_ktp", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.alamat_ktp &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.alamat_ktp}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="alamat_domisili" className="text-right capitalize">alamat domisili</Label>
                            <Input
                                id="alamat_domisili"
                                value={data.alamat_domisili}
                                onChange={(e) => setData("alamat_domisili", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.alamat_domisili &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.alamat_domisili}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_ktp" className="text-right capitalize">no KTP</Label>
                            <Input
                                type={'number'}
                                id="no_ktp"
                                value={data.no_ktp}
                                onChange={(e) => setData("no_ktp", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_ktp &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.no_ktp}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_kk" className="text-right capitalize">no KK</Label>
                            <Input
                                type={'number'}
                                id="no_kk"
                                value={data.no_kk}
                                onChange={(e) => setData("no_kk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_kk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.no_kk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="nama_ibu_kandung" className="text-right capitalize">Nama Ibu Kandung</Label>
                            <Input
                                id="nama_ibu_kandung"
                                value={data.nama_ibu_kandung}
                                onChange={(e) => setData("nama_ibu_kandung", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.nama_ibu_kandung &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.nama_ibu_kandung}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="baju" className="text-right capitalize">Ukuran Baju</Label>
                            <Input
                                id="baju"
                                value={data.baju}
                                onChange={(e) => setData("baju", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.baju &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.baju}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="celana" className="text-right capitalize">Ukuran celana</Label>
                            <Input
                                id="celana"
                                value={data.celana}
                                onChange={(e) => setData("celana", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.celana &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.celana}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="sepatu" className="text-right capitalize">Ukuran sepatu</Label>
                            <Input
                                id="sepatu"
                                value={data.sepatu}
                                onChange={(e) => setData("sepatu", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.sepatu &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.sepatu}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="npwp" className="text-right capitalize">NPWP</Label>
                            <Input
                                id="npwp"
                                value={data.npwp}
                                onChange={(e) => setData("npwp", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.npwp &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.npwp}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_bpjs_kes" className="text-right capitalize">No BPJS Kesehatan</Label>
                            <Input
                                id="no_bpjs_kes"
                                value={data.no_bpjs_kes}
                                onChange={(e) => setData("no_bpjs_kes", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_bpjs_kes &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.no_bpjs_kes}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="va_bpjs_kes" className="text-right capitalize">VA BPJS Kesehatan</Label>
                            <Input
                                id="va_bpjs_kes"
                                value={data.va_bpjs_kes}
                                onChange={(e) => setData("va_bpjs_kes", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.va_bpjs_kes &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.va_bpjs_kes}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="status_bpjs_kes" className="text-right capitalize">status BPJS
                                Kesehatan</Label>
                            <Input
                                id="status_bpjs_kes"
                                value={data.status_bpjs_kes}
                                onChange={(e) => setData("status_bpjs_kes", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.status_bpjs_kes &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.status_bpjs_kes}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="ket_bpjs_kes" className="text-right capitalize">ket BPJS
                                Kesehatan</Label>
                            <Input
                                id="ket_bpjs_kes"
                                value={data.ket_bpjs_kes}
                                onChange={(e) => setData("ket_bpjs_kes", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.ket_bpjs_kes &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.ket_bpjs_kes}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="no_bpjs_tk" className="text-right capitalize">No BPJS
                                Ketenagakerjaan</Label>
                            <Input
                                id="no_bpjs_tk"
                                value={data.no_bpjs_tk}
                                onChange={(e) => setData("no_bpjs_tk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.no_bpjs_tk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.no_bpjs_tk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="va_bpjs_tk" className="text-right capitalize">VA BPJS
                                Ketenagakerjaan</Label>
                            <Input
                                id="va_bpjs_tk"
                                value={data.va_bpjs_tk}
                                onChange={(e) => setData("va_bpjs_tk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.va_bpjs_tk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.va_bpjs_tk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="status_bpjs_tk" className="text-right capitalize">status BPJS
                                Ketenagakerjaan</Label>
                            <Input
                                id="status_bpjs_tk"
                                value={data.status_bpjs_tk}
                                onChange={(e) => setData("status_bpjs_tk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.status_bpjs_tk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.status_bpjs_tk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="ket_bpjs_tk" className="text-right capitalize">ket BPJS
                                Ketenagakerjaan</Label>
                            <Input
                                id="ket_bpjs_tk"
                                value={data.ket_bpjs_tk}
                                onChange={(e) => setData("ket_bpjs_tk", e.target.value)}
                                className="col-span-3 text-neutral-600"
                            />
                            {errors.ket_bpjs_tk &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.ket_bpjs_tk}</span>}
                        </div>
                        <div className="grid grid-cols-4 items-center gap-4">
                            <Label htmlFor="wajib_sertifikasi" className="text-right capitalize">Wajib
                                Sertifikasi</Label>
                            <Select
                                value={data.wajib_sertifikasi.toString()}
                                onValueChange={(value) => setData("wajib_sertifikasi", value === "true")}
                            >
                                <SelectTrigger className="col-span-3 text-neutral-600">
                                    <SelectValue placeholder="Pilih Ya/Tidak"/>
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="true">Ya</SelectItem>
                                    <SelectItem value="false">Tidak</SelectItem>
                                </SelectContent>
                            </Select>
                            {errors.wajib_sertifikasi &&
                                <span className="text-red-500 col-span-4 text-xs">{errors.wajib_sertifikasi}</span>}
                        </div>
                    </div>
                    <DialogFooter>
                        <Button type="submit" className="bg-fountain-blue-400">Tambah</Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
