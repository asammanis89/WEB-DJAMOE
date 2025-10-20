<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Flyer;
use App\Models\About;
use App\Models\Location;
use App\Models\Article;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Beranda.
     */
    public function index()
    {
        // DIPERBAIKI: Menggunakan latest() untuk memastikan flyer terbaru yang tampil
        $flyers = Flyer::latest()->get();

        // Query ini sudah bagus, menggunakan eager loading dan filter
        $featuredProducts = Product::with('category')
            ->where('is_bestseller', true)
            ->latest()
            ->take(8)
            ->get();

        return view('welcome', compact('flyers', 'featuredProducts'));
    }

    /**
     * Menampilkan halaman Produk.
     * Logika ini sudah berfungsi dengan baik untuk menangani dua skenario.
     */
    public function produk(Category $category = null)
    {
        $whatsappNumber = '6282232279783';
        $categories = null;
        $products = null;

        if ($category) {
            $category->load('products');
            $products = $category->products;
        } else {
            $categories = Category::latest()->get();
        }

        return view('produk', compact('category', 'categories', 'products', 'whatsappNumber'));
    }

    /**
     * Menampilkan halaman Aktivitas.
     */
    public function aktivitas()
    {
        $articles = Article::latest()->get();
        return view('aktivitas', compact('articles'));
    }

    /**
     * Menampilkan halaman Outlet / Temukan Kami.
     */
    public function outlet()
    {
        // orderBy 'asc' (dari yang terlama) mungkin disengaja, jadi ini tidak diubah.
        $locations = Location::orderBy('created_at', 'asc')->get();
        return view('outlet', compact('locations'));
    }

    /**
     * Menampilkan halaman Tentang Kami (Cerita Kami).
     */
    public function about()
    {
        // DIPERBAIKI: Mengambil hanya 1 data 'About' yang paling baru.
        // Halaman 'Tentang Kami' biasanya hanya menampilkan satu konten.
        $abouts = About::orderBy('year_text', 'asc')->get(); 
    
    // Kirim 'abouts' (plural) ke view
    return view('about', compact('abouts'));
    }

    /**
     * Mengambil data produk berdasarkan kategori untuk permintaan AJAX.
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsByCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();

        return response()->json([
            'category' => $category->category_name,
            'products' => $products
        ]);
    }

    /**
     * Mengambil detail satu produk untuk ditampilkan di modal (AJAX).
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetail(Product $product)
    {
        // Mengembalikan data produk sebagai JSON
        return response()->json($product);
    }
}
