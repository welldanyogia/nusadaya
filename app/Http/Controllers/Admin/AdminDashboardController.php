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

        $projects = Project::with('alatkerjas','employees')->get()->map(function ($project) {

            $project_employees = $project->employees->count() ?? 0;
            $project->realisasi_di_lapangan = $project_employees;
            $project->save();

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

        // Hanya update kolom 'realisasi_dilapangan' berdasarkan jumlah tenaga kerja


        $total_project = $projects->count();
        $category = Category::all();
        $total_tenagakerja = TenagaKerja::all()->count();

        // Tambahkan log untuk melihat error SQL
        try {
            return Inertia::render('Admin/Dashboard', [
                'projects' => $projects,
                'total_project' => $total_project,
                'category' => $category,
                'total_tenagakerja' => $total_tenagakerja,
            ]);
        } catch (\Exception $e) {
            Log::error('Error rendering Admin Dashboard:', [
                'error' => $e->getMessage(),
                'sql' => $e->getTraceAsString(),
            ]);
            throw $e; // Jika perlu, lempar exception ke luar untuk menangani di tempat lain
        }
    }
}
