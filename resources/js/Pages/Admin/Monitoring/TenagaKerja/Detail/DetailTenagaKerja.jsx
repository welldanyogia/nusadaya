import {Head, router} from "@inertiajs/react";
import {Card, CardContent, CardHeader} from "@/Components/ui/card.jsx";
import {Button} from "@/Components/ui/button.jsx";
import AuthenticatedAdmin from "@/Layouts/AuthenticatedAdminLayout.jsx";
import "tailwind-pdf-viewer/style.css";
import {useState} from "react";
import axios from 'axios';
import {Viewer, Worker} from "@react-pdf-viewer/core";
import {Badge} from "@/Components/ui/badge.jsx";
import {Input} from "@/Components/ui/input.jsx";

export default function DetailTenagaKerja({auth, tenagakerja}) {
    const [selectedFile, setSelectedFile] = useState(null);
    const [pdfURL, setPdfURL] = useState(
        tenagakerja.documents && tenagakerja.documents.length > 0
            ? `${tenagakerja.documents[tenagakerja.documents.length - 1].file_path}`
            : null
    );
    const [openPDF, setOpenPDF] = useState(false)
    const [addDocument, setAddDocument] = useState(false)
    const [loading, setLoading] = useState(false)

    const handleFileChange = (e) => {
        setSelectedFile(e.target.files[0]);
    };

    const handleLihat = (filename) => {
        const pdfURL = filename;
        window.open(pdfURL, '_blank');
    };


    // Fungsi untuk memformat tanggal
    function formatTanggal(tanggal) {
        const date = new Date(tanggal);
        return date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
        });
    }


    const handleFileUpload = async () => {
        setLoading(true)
        const formData = new FormData();
        const fileInput = document.getElementById('file-input');
        // const selectedFile = fileInput.files[0];

        if (!selectedFile) {
            console.error('No file selected');
            return;
        }

        formData.append('file', selectedFile);
        formData.append('tenaga_kerja_id', tenagakerja.id); // Ensure this is set

        try {
            // console.log("Uploading file with data: ", {
            //     tenaga_kerja_id: tenagakerja.id,
            //     file: selectedFile,
            // });

            const response = await axios.post(route('tenagakerja.documentUpload'), formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            setSelectedFile(null)
            setLoading(false)
            setAddDocument(false)
            router.reload()
            // console.log(response.data);
        } catch (error) {
            setLoading(false)
            setAddDocument(false)
            // console.error('Upload failed:', error.response ? error.response.data : error.message);
        }
    };

    const handleDownloadDocument = async (pdfUrl) => {
        if (!pdfUrl) {
            console.error("PDF URL is not provided.");
            return;
        }

        try {
            const response = await fetch(pdfUrl, {
                method: "GET",
                headers: {
                    "Content-Type": "application/pdf",
                },
            });

            if (!response.ok) {
                throw new Error(`Failed to fetch the document: ${response.statusText}`);
            }

            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = pdfUrl.split("/").pop() || "document.pdf"; // Nama file diambil dari URL atau default
            document.body.appendChild(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        } catch (error) {
            console.error("Error downloading the document:", error);
        }
    };

    function capitalizeFirstLetter(text) {
        return text.replace(/\b\w/g, char => char.toUpperCase());
    }
    function capitalizeWords(text) {
        text = text.toLowerCase()
        return text.replace(/\b\w/g, char => char.toUpperCase());
    }


    return (
        <AuthenticatedAdmin
            user={auth.user}
            title="Detail Tenaga Kerja"
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Detail Tenaga Kerja</h2>}
        >
            <Head title="Dashboard"/>

            <div className="py-12 space-y-6">
                <Card className={"bg-fountain-blue-400 shadow drop-shadow-lg max-w-7xl"}>
                    <CardHeader className={"text-white text-3xl max-sm:text-lg font-bold"}>
                        Detail Tenaga Kerja : {tenagakerja.nama}
                    </CardHeader>
                </Card>

                <Card className="shadow drop-shadow-lg max-w-7xl">
                    <CardContent
                        className="grid grid-cols-4 gap-4 max-sm:gap-3 px-10 py-6 max-sm:text-xs max-sm:grid-cols-1 max-lg:grid max-lg:grid-cols-2">
                        <div className={"grid gap-2"}>
                            <h2>Nama</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.nama}</span>
                        </div>
                        <div>
                            <div>Unit PLN</div>
                            <div
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.unit_pln}</div>
                        </div>
                        <div>
                            <h2>Penempatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.penempatan}</span>
                        </div>
                        <div>
                            <h2>No. SPK</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_spk}</span>
                        </div>
                        <div>
                            <h2>Proyek</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.project.nama_pekerjaan}</span>
                        </div>
                        <div>
                            <h2>NIP</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.nip}</span>
                        </div>
                        <div>
                            <h2>Jabatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.jabatan}</span>
                        </div>
                        <div>
                            <h2>Tanggal Lahir</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tanggal_lahir}</span>
                        </div>
                        <div>
                            <h2>Usia</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.usia} Tahun</span>
                        </div>
                        <div>
                            <h2>Sisa Masa Pensiun</h2>
                            {tenagakerja.sisa_masa_pensiun !== null && (
                                tenagakerja.sisa_masa_pensiun < 0 ? (
                                    <Badge className="font-bold bg-red-500 text-white px-2 py-1 rounded-lg">
                                        Pensiun
                                    </Badge>
                                ) : (
                                    <span className="font-bold break-words overflow-hidden whitespace-normal">
                                        {Math.floor(tenagakerja.sisa_masa_pensiun / 12)} Tahun {tenagakerja.sisa_masa_pensiun % 12} Bulan
                                    </span>
                                )
                            )}
                        </div>

                        <div className={"grid gap-2"}>
                            <h2>Kelompok</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.kelompok}</span>
                        </div>
                        <div className={"grid gap-2"}>
                            <h2>Region</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.region}</span>
                        </div>
                        <div>
                            <div>Cabang</div>
                            <div
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.cabang}</div>
                        </div>
                        <div>
                            <h2>Kategori</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.kategori ? tenagakerja.kategori : '-'}</span>
                        </div>
                        <div>
                            <h2>Status</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.status}</span>
                        </div>
                        <div>
                            <h2>Tanggal Masuk</h2>
                            <span className="font-bold break-words overflow-hidden whitespace-normal">
                                {formatTanggal(tenagakerja.tgl_masuk)}
                            </span>
                        </div>

                        <div>
                            <h2>Tanggal Mulai Bekerja</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{formatTanggal(tenagakerja.tgl_mulai_bekerja)}</span>
                        </div>
                        <div>
                            <h2>Tanggal Berhenti</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tgl_berhenti ? formatTanggal(tenagakerja.tgl_berhenti) : '-'}</span>
                        </div>
                        <div>
                            <h2>Nomor Kontrak</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_kontrak}</span>
                        </div>
                        <div>
                            <h2>Tanggal Awal Kontrak</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tgl_awal_kontrak ? formatTanggal(tenagakerja.tgl_awal_kontrak) : '-'}</span>
                        </div>
                        <div>
                            <h2>Tanggal Akhir Kontrak</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tgl_akhir_kontrak ? formatTanggal(tenagakerja.tgl_akhir_kontrak) : '-'}</span>
                        </div>

                        <div>
                            <h2>Jenis Kelamin</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.jenis_kelamin ? tenagakerja.jenis_kelamin : '-'}</span>
                        </div>

                        <div className={"grid gap-2"}>
                            <h2>Tempat Lahir</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tempat_lahir}</span>
                        </div>
                        <div>
                            <div>Tanggal Lahir</div>
                            <div
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.tanggal_lahir ? formatTanggal(tenagakerja.tanggal_lahir) : '-'}</div>
                        </div>
                        <div>
                            <h2>Pendidikan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.pendidikan ? tenagakerja.pendidikan : '-'}</span>
                        </div>
                        <div>
                            <h2>Jurusan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.jurusan ? tenagakerja.jurusan : '-'}</span>
                        </div>
                        <div>
                            <h2>Agama</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.agama}</span>
                        </div>
                        <div>
                            <h2>Golongan Darah</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.gol_darah ? tenagakerja.gol_darah : '-'}</span>
                        </div>
                        <div>
                            <h2>Status Kawin</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.status_kawin ? tenagakerja.status_kawin : '-'}</span>
                        </div>
                        <div>
                            <h2>Telepon</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.telepon ? tenagakerja.telepon : '-'}</span>
                        </div>
                        <div>
                            <h2>Email</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.email ? tenagakerja.email : '-'}</span>
                        </div>
                        <div>
                            <h2>Alamat KTP</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.alamat_ktp ? tenagakerja.alamat_ktp : '-'}</span>
                        </div>
                        <div>
                            <h2>Alamat Domisili</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.alamat_domisili ? tenagakerja.alamat_domisili : '-'}</span>
                        </div>
                        <div>
                            <h2>No KTP</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_ktp ? tenagakerja.no_ktp : '-'}</span>
                        </div>
                        <div>
                            <h2>No KK</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_kk ? tenagakerja.no_kk : '-'}</span>
                        </div>
                        <div>
                            <h2>Nama Ibu Kandung</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.nama_ibu_kandung ? tenagakerja.nama_ibu_kandung : '-'}</span>
                        </div>
                        <div>
                            <h2>Ukuran Baju</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.baju ? tenagakerja.baju : '-'}</span>
                        </div>
                        <div>
                            <h2>Ukuran Celana</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.celana ? tenagakerja.celana : '-'}</span>
                        </div>
                        <div>
                            <h2>Ukuran Sepatu</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.sepatu ? tenagakerja.sepatu : '-'}</span>
                        </div>
                        <div>
                            <h2>NPWP</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.npwp ? tenagakerja.npwp : '-'}</span>
                        </div>
                        <div>
                            <h2>No BPJS Kesehatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_bpjs_kes ? tenagakerja.no_bpjs_kes : '-'}</span>
                        </div>
                        <div>
                            <h2>VA BPJS Kesehatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.va_bpjs_kes ? tenagakerja.va_bpjs_kes : '-'}</span>
                        </div>
                        <div>
                            <h2>Status BPJS Kesehatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.status_bpjs_kes ? tenagakerja.status_bpjs_kes : '-'}</span>
                        </div>
                        <div>
                            <h2>Keterangan BPJS Kesehatan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.ket_bpjs_kes ? tenagakerja.ket_bpjs_kes : '-'}</span>
                        </div>
                        <div>
                            <h2>No BPJS Ketenagakerjaan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.no_bpjs_tk ? tenagakerja.no_bpjs_tk : '-'}</span>
                        </div>
                        <div>
                            <h2>VA BPJS Ketenagakerjaan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.va_bpjs_tk ? tenagakerja.va_bpjs_tk : '-'}</span>
                        </div>
                        <div>
                            <h2>Status BPJS Ketenagakerjaan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.status_bpjs_tk ? tenagakerja.status_bpjs_tk : '-'}</span>
                        </div>
                        <div>
                            <h2>Keterangan BPJS Ketenagakerjaan</h2>
                            <span
                                className="font-bold break-words overflow-hidden whitespace-normal">{tenagakerja.ket_bpjs_tk ? tenagakerja.ket_bpjs_tk : '-'}</span>
                        </div>

                        <div>
                            <h2>Arsip Kontrak</h2>
                            <span className="font-bold break-words overflow-hidden whitespace-normal">
                                {tenagakerja.documents.length > 0 ?
                                    <Badge className={"bg-green-600"}>
                                        Ada
                                    </Badge> :
                                    <Badge className={"bg-red-600"}>
                                        Tidak Ada
                                    </Badge>
                                }
            </span>
                        </div>
                    </CardContent>
                </Card>


                <Card className={"bg-fountain-blue-400 shadow drop-shadow-lg max-w-7xl"}>
                    <CardHeader className={"text-white font-bold"}>
                        Arsip Kontrak {capitalizeWords(tenagakerja.nama)}
                    </CardHeader>
                    <CardContent>
                        <div className={"rounded flex max-sm:grid max-sm:gap-2 max-sm:justify-start gap-2"}>
                            {
                                auth.user.role !== 'user' && (
                                    <div>
                                        {pdfURL !== null ? (
                                            <div>
                                                <Button onClick={() => setAddDocument(true)}
                                                        className={addDocument ? 'hidden' : ''}
                                                >
                                                    Ganti Dokumen
                                                </Button>
                                                <Button onClick={() => setAddDocument(false)}
                                                        className={!addDocument ? 'hidden' : ''}
                                                        variant={'destructive'}
                                                >
                                                    Batal
                                                </Button>
                                            </div>
                                        ) : (
                                            <Button onClick={() => setAddDocument(true)}>
                                                Upload Dokumen
                                            </Button>
                                        )}
                                        <div className={'flex mt-2'}>
                                            {addDocument && (
                                                <Input
                                                    id="file-upload"
                                                    type="file"
                                                    className="w-fit"
                                                    onChange={handleFileChange}
                                                />
                                            )}
                                            {selectedFile && (
                                                <Button className={"ml-4"} onClick={handleFileUpload}>
                                                    {loading ? 'Menyimpan' : 'Simpan'}
                                                </Button>
                                            )}
                                        </div>
                                    </div>

                                )
                            }
                            {openPDF === false && pdfURL !== null ? (
                                <div className={"flex gap-2"}>
                                    <Button className={""} onClick={() => setOpenPDF(true)}>
                                        Lihat Dokumen
                                    </Button>
                                    <Button className={""} onClick={() => handleDownloadDocument(pdfURL)}>
                                        Download Dokumen
                                    </Button>
                                </div>
                            ) : (
                                <Button className={!pdfURL ? 'hidden' : ''}
                                        variant={'destructive'}
                                        onClick={() => setOpenPDF(false)}>
                                    Tutup Dokumen
                                </Button>
                            )}
                        </div>
                        {openPDF === true && pdfURL !== null && (
                            <div className="mt-4 flex justify-center items-center p-4 relative">
                                <Worker workerUrl="https://unpkg.com/pdfjs-dist@3.11.174/build/pdf.worker.min.js">
                                    <div
                                        style={{
                                            border: '1px solid rgba(0, 0, 0, 0.3)',
                                            // height: '750px',
                                        }}
                                        className="pdf-viewer-container mx-auto w-5/6 h-96 overflow-auto">
                                        <Viewer fileUrl={pdfURL}/>
                                    </div>
                                </Worker>
                            </div>
                        )}
                    </CardContent>

                </Card>
            </div>
        </AuthenticatedAdmin>
    );
}
