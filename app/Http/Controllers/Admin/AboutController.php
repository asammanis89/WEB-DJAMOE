<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('abouts', 'public');

        About::create($request->except('image') + ['image' => $path]);

        return redirect()->route('admin.abouts.index')->with('success', 'Cerita berhasil ditambahkan.');
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'year_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $about->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($about->image);
            $path = $request->file('image')->store('abouts', 'public');
        }

        $about->update($request->except('image') + ['image' => $path]);

        return redirect()->route('admin.abouts.index')->with('success', 'Cerita berhasil diperbarui.');
    }

    public function destroy(About $about)
    {
        Storage::disk('public')->delete($about->image);
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'Cerita berhasil dihapus.');
    }
}