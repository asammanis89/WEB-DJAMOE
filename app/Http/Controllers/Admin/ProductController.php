<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk (dengan relasi kategori)
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Form tambah produk baru
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Simpan produk baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category_id'  => 'required|exists:categories,id',
            'price'        => 'required|numeric|min:0',
            'image_url'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Simpan file gambar ke storage
            $path = $request->file('image_url')->store('products', 'public');

            // Simpan data produk
            Product::create([
                'product_name'  => $validated['product_name'],
                'description'   => $validated['description'] ?? null,
                'category_id'   => $validated['category_id'],
                'price'         => $validated['price'],
                'image_url'     => $path,
                'is_bestseller' => $request->boolean('is_bestseller'),
            ]);

            DB::commit();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk baru berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            if (isset($path)) {
                Storage::disk('public')->delete($path);
            }
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan produk: ' . $th->getMessage());
        }
    }

    /**
     * Form edit produk
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('category_name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update data produk
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category_id'  => 'required|exists:categories,id',
            'price'        => 'required|numeric|min:0',
            'image_url'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'product_name'  => $validated['product_name'],
                'description'   => $validated['description'] ?? null,
                'category_id'   => $validated['category_id'],
                'price'         => $validated['price'],
                'is_bestseller' => $request->boolean('is_bestseller'),
            ];

            // Jika ada file baru, hapus gambar lama lalu simpan baru
            if ($request->hasFile('image_url')) {
                if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                    Storage::disk('public')->delete($product->image_url);
                }
                $path = $request->file('image_url')->store('products', 'public');
                $data['image_url'] = $path;
            }

            $product->update($data);
            DB::commit();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Data produk berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui produk: ' . $th->getMessage());
        }
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }

            $product->delete();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Gagal menghapus produk: ' . $th->getMessage());
        }
    }
}
