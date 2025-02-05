<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Monitoring\AlatKerjaController;
use App\Http\Controllers\Admin\Monitoring\DetailAlatKerja\DetailAlatKerjaController;
use App\Http\Controllers\Admin\Monitoring\DetailProyek\DetailProyekController;
use App\Http\Controllers\Admin\Monitoring\DetailTenagaKerja\DetailTenagaKerjaController;
use App\Http\Controllers\Admin\Monitoring\ProyekController;
use App\Http\Controllers\Admin\Monitoring\TenagaKerjaController;
use App\Http\Controllers\Admin\SuperAdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
//    return Inertia::render('Auth/Login', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
    return redirect("/login");
});

Route::get('/documents/{filename}', function ($filename) {
    $path = storage_path('app/public/documents/' . $filename);

    Log::info($path);
    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('documents.show');

Route::get('/dashboard', function () {
    $user = auth()->user();

    // Check the user's role and redirect accordingly
    if ($user->role === 'superadmin') {
        return redirect()->route('superadmin.dashboard')->with('refresh',true);
    } elseif ($user->role === 'admin') {
        return redirect()->route('superadmin.dashboard')->with('refresh',true);
    } elseif ($user->role === 'user') {
        return redirect()->route('superadmin.dashboard')->with('refresh',true);
    } else {
        return redirect()->route('dashboard')->with('refresh',true); // Default dashboard if no specific role
    }
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
//    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('superadmin.dashboard');
//    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Default dashboard
    Route::get('/admin/dashboard/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/admin/dashboard/alat-kerja', [AlatKerjaController::class, 'index'])->name('alatkerja.index');
    Route::get('/admin/dashboard/tenaga-kerja', [TenagaKerjaController::class, 'index'])->name('tenagakerja.index');
    Route::get('/admin/dashboard/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
    Route::post('/admin/dashboard/user-management/store', [UserManagementController::class, 'store'])->name('user-management.store');
    Route::post('/admin/dashboard/user-management/update/{id}', [UserManagementController::class, 'update'])->name('user-management.update');
    Route::delete('/admin/dashboard/user-management/delete/{id}', [UserManagementController::class, 'destroy'])->name('user-management.delete');

//    Add Category
    Route::post('/admin/monitoring/proyek/category', [ProyekController::class, 'storeCategory']);
    //    Get Category
    Route::post('/admin/monitoring/proyek/getCategory', [ProyekController::class, 'getCategory']);
//    Add Project
    Route::post('/admin/monitoring/proyek/store', [ProyekController::class, 'store']);
//    Add Alat Kerja
    Route::post('/admin/monitoring/alat-kerja/store', [AlatKerjaController::class, 'store']);
//    Add Tenaga Kerja
    Route::post('/admin/monitoring/tenaga-kerja/store', [TenagaKerjaController::class, 'store'])->name('tenagakerja.store');
//    Delete Project
    Route::delete('/admin/monitoring/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');
//    Update Projetc
    Route::post('/admin/monitoring/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');


//    Detail Project
    Route::get('/admin/monitoring/proyek/{id}', [DetailProyekController::class, 'index'])->name('detailproyek.index');
//    Detail Tenaga Kerja
    Route::get('/admin/monitoring/tenaga-kerja/{id}', [DetailTenagaKerjaController::class, 'index'])->name('detailtenagakerja.index');
//    Detail Alat Kerja
    Route::get('/admin/monitoring/alat-kerja/{id}', [DetailAlatKerjaController::class, 'index'])->name('detailalatkerja.index');
//    Update Alat Kerja
    Route::post('/admin/monitoring/alat-kerja/{id}', [AlatKerjaController::class, 'update']);
//    Route::post('/admin/monitoring/tenaga-kerja/{id}', [TenagaKerjaController::class, 'update']);
//    Delete Alat Kerja
    Route::delete('/admin/monitoring/alat-kerja/{id}', [AlatKerjaController::class, 'destroy'])->name('alatkerja.destroy');
//    Delete Tenaga Kerja
    Route::delete('/admin/monitoring/tenaga-kerja/{id}', [TenagaKerjaController::class, 'destroy'])->name('tenagakerja.destroy');
//    Update Tenaga Kerja
    Route::put('/admin/monitoring/tenagakerja/{id}', [TenagaKerjaController::class, 'update'])->name('tenagakerja.update');
//    Upload Dokumen Tenaga Kerja
    Route::post('/admin/tenaga-kerja/upload-document', [TenagaKerjaController::class, 'documentUploadGCS'])->name('tenagakerja.documentUpload');
//    Download File Tenaga Kerja
    Route::get('/tenagakerja/{tenagaKerjaId}/download', [TenagaKerjaController::class, 'downloadFile'])->name('tenagakerja.download');

});
require __DIR__ . '/auth.php';
