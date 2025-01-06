<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // If the user is a superadmin, fetch all users
        if ($user->role === 'superadmin') {
            $users = User::all();  // Fetch all users
        }
        // If the user is an admin, fetch only users with the 'user' role
        elseif ($user->role === 'admin') {
            $users = User::where('role', 'user')->get();  // Fetch only 'user' role users
        }
        return Inertia::render('Admin/UserManagement/Dashboard', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging: Dump request data
        // dd($request->all());

        try {
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:admin,user',
            ]);

            // Debugging: Log validated data
            Log::info('Validated Data:', $validatedData);

            // Simpan data ke dalam tabel users
            $user = User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']), // Enkripsi password
                'role' => $validatedData['role'],
            ]);

            // Debugging: Log user creation success
            Log::info('User created successfully:', $user->toArray());

            // Flash success message
            session()->flash('success', 'User berhasil ditambahkan.');

            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect()->route('user-management.index')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Debugging: Log error
            Log::error('Error while creating user:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect dengan pesan error
            return redirect()->route('user-management.index')->with('error' ,'Terjadi kesalahan, silakan coba lagi.');
        }
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
        try {
            // Validate incoming data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'role' => 'required|string|in:admin,user',
            ]);

            // Find the user by ID
            $user = User::findOrFail($id);

            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            }
            // Update the user
            $user->update($validatedData);

            // Flash success message and redirect
            session()->flash('success', 'User berhasil diperbarui.');
            return redirect()->route('user-management.index')->with('success', 'User berhasil diperbarui.');
        } catch (\Exception $e) {
            // Log error and redirect with an error message
            Log::error('Error while updating user:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('user-management.index')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Delete the user
            $user->delete();

            // Flash success message and redirect
            session()->flash('success', 'User berhasil dihapus.');
            return redirect()->route('user-management.index')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error and redirect with an error message
            Log::error('Error while deleting user:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('user-management.index')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }
}
