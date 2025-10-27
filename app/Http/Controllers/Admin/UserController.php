<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\User;

class UserController extends Controller
{
    /**
     * REVISI 1: Menampilkan semua user (admin & super_admin),
     * kecuali diri sendiri.
     */
    public function index()
    {
        // Ambil ID super admin yang sedang login
        $currentUserId = Auth::id(); 
        
        // Ambil semua user (admin DAN super_admin) kecuali diri sendiri
        $users = User::where('id_user', '!=', $currentUserId)->get();
        
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * REVISI 2: Memperbolehkan pembuatan 'admin' atau 'super_admin'
     * melalui form.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username', // KEMBALI KE USERNAME
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,super_admin', // Tambahkan validasi role
        ]);

        User::create([
            'username' => $request->username, // KEMBALI KE USERNAME
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Ambil role dari request
            'is_active' => true,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil dibuat!');
    }

    /**
     * REVISI 1: Boleh edit user manapun (admin/super_admin)
     * kecuali diri sendiri.
     */
    public function edit(User $user)
    {
        // Logika baru: Tidak bisa edit diri sendiri
        if ($user->id_user === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak bisa mengedit data diri sendiri di halaman ini.');
        }
        
        return view('admin.users.edit', compact('user'));
    }

    /**
     * REVISI 1 & 2: Boleh update user manapun (admin/super_admin)
     * termasuk mengubah role, kecuali diri sendiri.
     */
    public function update(Request $request, User $user)
    {
        // Logika baru: Tidak bisa update diri sendiri
        if ($user->id_user === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak bisa memperbarui data diri sendiri.');
        }

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user', // KEMBALI KE USERNAME
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|in:admin,super_admin', // Tambahkan validasi role
        ]);

        $data = [
            'username' => $request->username, // KEMBALI KE USERNAME
            'email' => $request->email,
            'role' => $request->role, // Tambahkan update role
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    /**
     * REVISI 1: Boleh menonaktifkan user manapun (admin/super_admin)
     * kecuali diri sendiri.
     */
    public function deactivate(User $user)
    {
        // Logika baru: Tidak bisa menonaktifkan diri sendiri
        if ($user->id_user === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak bisa menonaktifkan diri sendiri.');
        }

        $user->update(['is_active' => false]);
        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil dinonaktifkan.');
    }

    public function activate(User $user)
    {
        // Tidak perlu cek, super admin boleh mengaktifkan akun manapun
        $user->update(['is_active' => true]);
        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil diaktifkan.');
    }

    /**
     * REVISI 1: Boleh menghapus user manapun (admin/super_admin)
     * kecuali diri sendiri.
     */
    public function destroy(User $user)
    {
        // Logika baru: Tidak bisa menghapus diri sendiri
        if ($user->id_user === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak bisa menghapus diri sendiri.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}


