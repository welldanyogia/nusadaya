<?php

namespace App\Http\Controllers\Admin\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\AlatKerja;
use App\Models\Document;
use App\Models\Project;
use App\Models\TenagaKerja;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = TenagaKerja::with('project','documents')->get();
        $projects = Project::all();
        return Inertia::render('Admin/Monitoring/TenagaKerja/Dashboard', [
            'employees' => $employees,
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:tenaga_kerjas,nip', // NIP harus unik
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'project_id' => 'required|exists:projects,id', // Pastikan project_id valid
            'unit_pln' => 'nullable|string|max:255',
            'penempatan' => 'nullable|string|max:255',
            'no_spk' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'usia' => 'nullable|integer',
            'sisa_masa_pensiun' => 'nullable|integer',
            'kelompok' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'cabang' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'tgl_masuk' => 'nullable|date',
            'tgl_mulai_bekerja' => 'nullable|date',
            'tgl_berhenti' => 'nullable|date',
            'no_kontrak' => 'nullable|string|max:255',
            'tgl_awal_kontrak' => 'nullable|date',
            'tgl_akhir_kontrak' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|string|max:255',
            'gol_darah' => 'nullable|string|max:255',
            'status_kawin' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'alamat_ktp' => 'nullable|string|max:255',
            'alamat_domisili' => 'nullable|string|max:255',
            'no_ktp' => 'nullable|string|max:20',
            'no_kk' => 'nullable|string|max:20',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'baju' => 'nullable|string|max:255',
            'celana' => 'nullable|string|max:255',
            'sepatu' => 'nullable|string|max:255',
            'npwp' => 'nullable|string|max:20',
            'no_bpjs_kes' => 'nullable|string|max:20',
            'va_bpjs_kes' => 'nullable|string|max:20',
            'status_bpjs_kes' => 'nullable|string|max:255',
            'ket_bpjs_kes' => 'nullable|string|max:255',
            'no_bpjs_tk' => 'nullable|string|max:20',
            'va_bpjs_tk' => 'nullable|string|max:20',
            'status_bpjs_tk' => 'nullable|string|max:255',
            'ket_bpjs_tk' => 'nullable|string|max:255',
            'wajib_sertifikasi' => 'nullable|boolean',
            'jurusan' => 'nullable|string|max:255',
        ]);

        // Simpan data baru ke database
        TenagaKerja::create([
            'nama' => $validatedData['nama'],
            'jabatan' => $validatedData['jabatan'],
            'nip' => $validatedData['nip'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tgl_lahir'],
            'project_id' => $validatedData['project_id'],
            'unit_pln' => $validatedData['unit_pln'],
            'penempatan' => $validatedData['penempatan'],
            'no_spk' => $validatedData['no_spk'],
            'agama' => $validatedData['agama'],
            'usia' => $validatedData['usia'],
            'sisa_masa_pensiun' => $validatedData['sisa_masa_pensiun'],
            'kelompok' => $validatedData['kelompok'],
            'region' => $validatedData['region'],
            'cabang' => $validatedData['cabang'],
            'kategori' => $validatedData['kategori'],
            'status' => $validatedData['status'],
            'tgl_masuk' => $validatedData['tgl_masuk'],
            'tgl_mulai_bekerja' => $validatedData['tgl_mulai_bekerja'],
            'tgl_berhenti' => $validatedData['tgl_berhenti'],
            'no_kontrak' => $validatedData['no_kontrak'],
            'tgl_awal_kontrak' => $validatedData['tgl_awal_kontrak'],
            'tgl_akhir_kontrak' => $validatedData['tgl_akhir_kontrak'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'pendidikan' => $validatedData['pendidikan'],
            'gol_darah' => $validatedData['gol_darah'],
            'status_kawin' => $validatedData['status_kawin'],
            'telepon' => $validatedData['telepon'],
            'email' => $validatedData['email'],
            'alamat_ktp' => $validatedData['alamat_ktp'],
            'alamat_domisili' => $validatedData['alamat_domisili'],
            'no_ktp' => $validatedData['no_ktp'],
            'no_kk' => $validatedData['no_kk'],
            'nama_ibu_kandung' => $validatedData['nama_ibu_kandung'],
            'baju' => $validatedData['baju'],
            'celana' => $validatedData['celana'],
            'sepatu' => $validatedData['sepatu'],
            'npwp' => $validatedData['npwp'],
            'no_bpjs_kes' => $validatedData['no_bpjs_kes'],
            'va_bpjs_kes' => $validatedData['va_bpjs_kes'],
            'status_bpjs_kes' => $validatedData['status_bpjs_kes'],
            'ket_bpjs_kes' => $validatedData['ket_bpjs_kes'],
            'no_bpjs_tk' => $validatedData['no_bpjs_tk'],
            'va_bpjs_tk' => $validatedData['va_bpjs_tk'],
            'status_bpjs_tk' => $validatedData['status_bpjs_tk'],
            'ket_bpjs_tk' => $validatedData['ket_bpjs_tk'],
            'wajib_sertifikasi' => $validatedData['wajib_sertifikasi'],
            'jurusan' => $validatedData['jurusan'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tenagakerja.index')->with('success', 'Tenaga kerja berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logging input request
        Log::info('Update Tenaga Kerja - Request Data:', $request->all());
        Log::info('ID Tenaga Kerja - Request Data:', ['id' => $id]);

        try {
            // Temukan tenaga kerja yang ingin diupdate
            $employee = TenagaKerja::findOrFail($id);
            Log::info('Update Tenaga Kerja - Employee Found:', ['id' => $id, 'employee' => $employee]);

            // Update data tenaga kerja tanpa validasi
            $employee->update([
                'nama' => $request->input('nama'),
                'jabatan' => $request->input('jabatan'),
                'nip' => $request->input('nip'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tgl_lahir'),
                'project_id' => $request->input('project_id'),
                'unit_pln' => $request->input('unit_pln'),
                'penempatan' => $request->input('penempatan'),
                'no_spk' => $request->input('no_spk'),
                'agama' => $request->input('agama'),
                'usia' => $request->input('usia'),
                'sisa_masa_pensiun' => $request->input('sisa_masa_pensiun'),
                'kelompok' => $request->input('kelompok'),
                'region' => $request->input('region'),
                'cabang' => $request->input('cabang'),
                'kategori' => $request->input('kategori'),
                'status' => $request->input('status'),
                'tgl_masuk' => $request->input('tgl_masuk'),
                'tgl_mulai_bekerja' => $request->input('tgl_mulai_bekerja'),
                'tgl_berhenti' => $request->input('tgl_berhenti'),
                'no_kontrak' => $request->input('no_kontrak'),
                'tgl_awal_kontrak' => $request->input('tgl_awal_kontrak'),
                'tgl_akhir_kontrak' => $request->input('tgl_akhir_kontrak'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'pendidikan' => $request->input('pendidikan'),
                'gol_darah' => $request->input('gol_darah'),
                'status_kawin' => $request->input('status_kawin'),
                'telepon' => $request->input('telepon'),
                'email' => $request->input('email'),
                'alamat_ktp' => $request->input('alamat_ktp'),
                'alamat_domisili' => $request->input('alamat_domisili'),
                'no_ktp' => $request->input('no_ktp'),
                'no_kk' => $request->input('no_kk'),
                'nama_ibu_kandung' => $request->input('nama_ibu_kandung'),
                'baju' => $request->input('baju'),
                'celana' => $request->input('celana'),
                'sepatu' => $request->input('sepatu'),
                'npwp' => $request->input('npwp'),
                'no_bpjs_kes' => $request->input('no_bpjs_kes'),
                'va_bpjs_kes' => $request->input('va_bpjs_kes'),
                'status_bpjs_kes' => $request->input('status_bpjs_kes'),
                'ket_bpjs_kes' => $request->input('ket_bpjs_kes'),
                'no_bpjs_tk' => $request->input('no_bpjs_tk'),
                'va_bpjs_tk' => $request->input('va_bpjs_tk'),
                'status_bpjs_tk' => $request->input('status_bpjs_tk'),
                'ket_bpjs_tk' => $request->input('ket_bpjs_tk'),
                'wajib_sertifikasi' => $request->input('wajib_sertifikasi'),
                'jurusan' => $request->input('jurusan'),
            ]);


            Log::info('Update Tenaga Kerja - Update Success:', ['id' => $id, 'data' => $request->all()]);

            // Redirect dengan pesan sukses
            return redirect()->route('tenagakerja.index')->with('success', 'Tenaga kerja berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Update Tenaga Kerja - Error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui tenaga kerja.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = TenagaKerja::find($id);

        if (!$employee) {
            // Redirect back with error if project not found
            return redirect()->back()->with('error', 'Tool not found.');
        }

        // Delete project
        $employee->delete();

        // Redirect back with success message
        return redirect()->route('tenagakerja.index')->with('success', 'Tool deleted successfully.');
    }

    public function documentUpload(Request $request)
    {
        try {
            Log::info("Entering documentUpload method.");

            // Log semua input dari request
            Log::info("Request data: ", $request->all());

            // Validate the incoming request data
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048', // Validate only PDFs up to 2MB
                'tenaga_kerja_id' => 'required|exists:tenaga_kerjas,id',
            ]);

            Log::info("Validation passed.");

            // Find the TenagaKerja instance
            $tenagaKerja = TenagaKerja::findOrFail($request->input('tenaga_kerja_id'));
            Log::info("Found TenagaKerja: ", ['id' => $tenagaKerja->id, 'name' => $tenagaKerja->nama]);

            // Create a file name based on the worker's name
            $fileName = str_replace(' ', '_', $tenagaKerja->nama) . '-' . time() . '.pdf'; // Replace spaces with underscores and append timestamp
            $filePath = $request->file('file')->storeAs('documents', $fileName, 'public');
            Log::info("File stored successfully: ", ['file_name' => $fileName, 'file_path' => $filePath]);

            // Create the document entry in the database
            Document::create([
                'tenaga_kerja_id' => $tenagaKerja->id,
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);

            Log::info("Document entry created successfully.");

            return response()->json(['message' => 'File uploaded successfully', 'file' => $fileName]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Validation failed: ", $e->validator->errors()->toArray());
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            Log::error("An error occurred: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while uploading the file.'], 500);
        }
    }

    public function documentUploadGCS(Request $request)
    {
        try {
            Log::info("Entering documentUploadGCS method.");

            // Log all input from the request
            Log::info("Request data: ", $request->all());

            // Validate the incoming request data
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048', // Validate only PDFs up to 2MB
                'tenaga_kerja_id' => 'required|exists:tenaga_kerjas,id',
            ]);

            Log::info("Validation passed.");

            // Find the TenagaKerja instance
            $tenagaKerja = TenagaKerja::findOrFail($request->input('tenaga_kerja_id'));
            Log::info("Found TenagaKerja: ", ['id' => $tenagaKerja->id, 'name' => $tenagaKerja->nama]);

            // Create a file name based on the worker's name
            $fileName = str_replace(' ', '_', $tenagaKerja->nama) . '-' . time() . '.pdf'; // Replace spaces with underscores and append timestamp
            $filePath = 'documents/' . $fileName;

            // Open a stream for the file
            $stream = fopen($request->file('file')->getRealPath(), 'r');

            // Ensure the stream is valid before writing
            if ($stream === false) {
                throw new \Exception('Unable to open stream for file upload.');
            }

            // Upload the file to Google Cloud Storage
            Storage::disk('gcs')->writeStream($filePath, $stream);
//            fclose($stream); // Close the stream after uploading

            Log::info("File uploaded to Google Cloud Storage: ", ['file_name' => $fileName, 'file_path' => $filePath]);
            $publicUrl = sprintf('https://storage.googleapis.com/%s/%s', env('GOOGLE_CLOUD_STORAGE_BUCKET'), $filePath);

            // Create the document entry in the database
            Document::create([
                'tenaga_kerja_id' => $tenagaKerja->id,
                'file_name' => $fileName,
                'file_path' => $publicUrl,
            ]);

            Log::info("Document entry created successfully.");

            // Construct the public URL for the uploaded file

            return redirect()->route('tenagakerja.index')->with('success', 'File uploaded successfully to GCS')->with('file', $fileName)->with('url', $publicUrl);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Validation failed: ", $e->validator->errors()->toArray());
            return redirect()->route('tenagakerja.index')->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            Log::error("An error occurred: " . $e->getMessage());
            return redirect()->route('tenagakerja.index')->with('error', 'An error occurred while uploading the file.');
        }
    }


    public function downloadFile($tenagaKerjaId)
    {
        try {
            // Find the latest document based on tenaga_kerja_id
            $document = Document::where('tenaga_kerja_id', $tenagaKerjaId)
                ->latest() // Get the latest document
                ->first();

            if (!$document) {
                // If no document is found, return an error response
                return response()->json(['error' => 'No document found for this employee.'], 404);
            }

            // Get the file path (URL in this case)
            $fileUrl = $document->file_path;

            // Check if the URL is valid and not empty
            if (filter_var($fileUrl, FILTER_VALIDATE_URL)) {
                // Redirect the user to the file's URL (cloud storage in this case)
                return redirect()->away($fileUrl);
            } else {
                // If the URL is not valid, return an error
                return response()->json(['error' => 'Invalid file URL.'], 400);
            }
        } catch (\Exception $e) {
            // Log any exception and return a server error
            Log::error("An error occurred while downloading the file: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while downloading the file.'], 500);
        }
    }



    public function uploadFile(Request $request)
    {
        // Validasi file untuk memastikan hanya PDF yang dapat diunggah
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048', // maksimal 2MB
        ]);

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('file')) {
            // Dapatkan file dari request
            $file = $request->file('file');

            // Tentukan nama unik untuk file
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file di dalam folder storage/app/public/uploads
            $path = $file->storeAs('public/uploads', $fileName);

            // Simpan informasi file ke database jika diperlukan (opsional)
            // FileModel::create(['file_path' => $path]);

            return response()->json([
                'message' => 'File berhasil diunggah',
                'file_path' => Storage::url($path)
            ]);
        }

        return response()->json([
            'message' => 'Tidak ada file yang diunggah'
        ], 400);
    }

}
