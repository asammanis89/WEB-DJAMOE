<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlyerController extends Controller
{
    
    /**
     * Tampilkan daftar flyers
     */
    public function index()
    {
        
        $flyers = Flyer::paginate(10);
        return view('admin.flyers.index', compact('flyers'));
    }

    /**
     * Tampilkan form untuk membuat flyer baru
     */
    public function create()
    {
        return view('admin.flyers.create');
    }

    /**
     * Simpan flyer baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image_url')->store('flyers', 'public');

        Flyer::create([
            'image_url' => $path,
        ]);

        return redirect()->route('admin.flyers.index')->with('success', 'Flyer berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit flyer
     */
    public function edit(Flyer $flyer)
    {
        return view('admin.flyers.edit', compact('flyer'));
    }

    /**
     * Update flyer di database
     */
    public function update(Request $request, Flyer $flyer)
    {
        $request->validate([
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus file lama
            if ($flyer->image_url) {
                Storage::disk('public')->delete($flyer->image_url);
            }
            $flyer->image_url = $request->file('image_url')->store('flyers', 'public');
        }

        $flyer->save();

        return redirect()->route('admin.flyers.index')->with('success', 'Flyer berhasil diperbarui!');
    }

    /**
     * Hapus flyer
     */
    public function destroy(Flyer $flyer)
    {
        if ($flyer->image_url) {
            Storage::disk('public')->delete($flyer->image_url);
        }

        $flyer->delete();

        return redirect()->route('admin.flyers.index')->with('success', 'Flyer berhasil dihapus!');
    }

    /**
     * Show flyer (opsional, biasanya tidak dipakai di admin)
     */
    public function show(Flyer $flyer)
    {
        //
    }
}
