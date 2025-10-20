<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $totalKategori = Category::count();
        $totalArtikel = Article::count();

        $totalUsers = User::whereIn('role', ['admin', 'superadmin'])->count();

        return view('admin.dashboard.index', compact(
            'totalProduk',
            'totalKategori',
            'totalArtikel',
            'totalUsers',
        ));
    }
}

