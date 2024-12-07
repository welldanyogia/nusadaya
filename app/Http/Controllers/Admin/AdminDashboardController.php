<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\TenagaKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function index()
    {
//        $projects = Project::with('alatKerjas')->get()->map(function ($project) {
//            // Format the date fields using Carbon
//            $project->tanggal_efektif_kontrak = Carbon::parse($project->tanggal_efektif_kontrak)->format('d-m-Y');
//            $project->akhir_kontrak = Carbon::parse($project->akhir_kontrak)->format('d-m-Y');
//            $project->created_at = Carbon::parse($project->created_at)->format('d-m-Y');
//            $project->updated_at = Carbon::parse($project->updated_at)->format('d-m-Y');
//
//            $project->category_name = $project->category ? $project->category->label : null;
//            return $project;
//        });
        $projects = Project::with('alatkerjas')->get()->map(function ($project) {
            // Cek jika ada perubahan hari dan update status_sisa_jangka_waktu_kontrak_bulan
            $currentDate = Carbon::now();
            $akhirKontrak = Carbon::parse($project->akhir_kontrak);

            // Jika akhir kontrak sudah lewat, set sisa bulan menjadi 0
            if ($currentDate->greaterThan($akhirKontrak)) {
                $project->status_sisa_jangka_waktu_kontrak_bulan = 0;
            } else {
                // Hitung perbedaan dalam bulan dan bulatkan
                $monthsLeft = round($currentDate->diffInMonths($akhirKontrak));
                $project->status_sisa_jangka_waktu_kontrak_bulan = $monthsLeft;
            }

            // Simpan perubahan jika ada perbedaan dengan data sebelumnya
            if ($project->isDirty('status_sisa_jangka_waktu_kontrak_bulan')) {
                $project->save();
            }

            // Format tanggal dengan Carbon
            $project->tanggal_efektif_kontrak = Carbon::parse($project->tanggal_efektif_kontrak)->format('d-m-Y');
            $project->akhir_kontrak = Carbon::parse($project->akhir_kontrak)->format('d-m-Y');
            $project->created_at = Carbon::parse($project->created_at)->format('d-m-Y');
            $project->updated_at = Carbon::parse($project->updated_at)->format('d-m-Y');

            // Tambahkan nama kategori
            $project->category_name = $project->category ? $project->category->label : null;

            // Ambil data alatkerja terkait
            $project->alatkerjas = $project->alatkerjas->map(function ($alatkerja) {
                return [
                    'id' => $alatkerja->id,
                    'nama_alat' => $alatkerja->nama_alat,
                    'tanggal_kontrak' => Carbon::parse($alatkerja->tanggal_kontrak)->format('d-m-Y'),
                    'sisa_jangka_waktu' => $alatkerja->sisa_jangka_waktu,
                    'keterangan' => $alatkerja->keterangan,
                    'catatan' => $alatkerja->catatan,
                ];
            });

            // Kelompokkan dan hitung alat kerja berdasarkan keterangan
            $project->alatkerja_summary = $project->alatkerjas->groupBy('keterangan')->map(function ($group, $keterangan) {
                return [
                    'keterangan' => $keterangan,
                    'count' => $group->count(),
                ];
            })->values();

            return $project;
        });

        foreach ($projects as $project) {
            $jumlahTenagaKerja = $project->employee->count(); // Hitung jumlah tenaga kerja untuk setiap proyek
            $project->realisasi_dilapangan = $jumlahTenagaKerja; // Update kolom sesuai dengan jumlah tenaga kerja
            $project->save(); // Simpan perubahan
        }

        $total_project = $projects->count();
        $category = Category::all();
        $total_tenagakerja = Tenagakerja::all()->count();

        return Inertia::render('Admin/Dashboard', [
            'projects' => $projects,
            'total_project' => $total_project,
            'category' => $category,
            'total_tenagakerja' => $total_tenagakerja,
        ]);
    }
}
