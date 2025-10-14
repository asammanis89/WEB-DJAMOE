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
        // Ambil flyer untuk hero slider
        $flyers = Flyer::all();

        // Ambil produk unggulan (bestseller) dengan relasi category
        $featuredProducts = Product::with('category')
            ->where('is_bestseller', true)
            ->latest()
            ->take(8)
            ->get();

        return view('welcome', compact('flyers', 'featuredProducts')); // Sesuaikan nama view jika berbeda
    }

    /**
     * Menampilkan halaman Produk.
     * Method ini telah diperbarui untuk menangani tampilan kategori dan produk.
     */
    public function produk(Category $category = null)
    {
        // Nomor WhatsApp sudah diperbarui sesuai permintaan Anda
        $whatsappNumber = '6282232279783'; // <-- NOMOR SUDAH BENAR

        $categories = null;
        $products = null;

        if ($category) {
            // Jika ada objek $category yang dikirim dari route (misal: /produk/kategori/jamu-kuat),
            // maka kita muat produk-produk yang ada di dalamnya.
            $category->load('products');
            $products = $category->products;
        } else {
            // Jika tidak ada kategori (pengguna mengunjungi /produk),
            // maka kita ambil semua data kategori untuk ditampilkan.
            $categories = Category::latest()->get();
        }

        // Kirim semua variabel yang mungkin dibutuhkan ke view.
        // View 'produk.blade.php' akan menentukan mana yang akan ditampilkan.
        return view('produk', compact('category', 'categories', 'products', 'whatsappNumber'));
    }

    /**
     * Menampilkan halaman Aktivitas.
     */
    public function aktivitas()
    {
        $articles = Article::latest()->get();
        return view('aktivitas', compact('articles')); // Sesuaikan nama view jika berbeda
    }

    /**
     * Menampilkan halaman Outlet / Temukan Kami.
     */
    public function outlet()
    {
        $locations = Location::orderBy('created_at', 'asc')->get();
        return view('outlet', compact('locations')); // Sesuaikan nama view jika berbeda
    }

    /**
     * Menampilkan halaman Tentang Kami (Cerita Kami).
     */
    public function about()
    {
        $abouts = About::orderBy('created_at', 'asc')->get();
        return view('about', compact('abouts')); // Sesuaikan nama view jika berbeda
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
     * ✅ METHOD BARU
     * Mengambil detail satu produk untuk ditampilkan di modal.
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetail(Product $product)
    {
        // Mengembalikan data produk sebagai JSON
        return response()->json($product);
    }
}

