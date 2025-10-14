@extends('admin.layouts.app')

@section('title', 'Kelola Produk')
@section('content_header_title', 'Daftar Produk')

@section('main-content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Produk</h3>
        <div class="card-tools">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Produk</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th> {{-- KOLOM BARU --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                    <td><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-thumbnail" width="100"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        {{-- KONTEN BARU --}}
                        @if($product->is_bestseller)
                            <span class="badge badge-success">Bestseller</span>
                        @else
                            <span class="badge badge-secondary">Reguler</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data produk.</td> {{-- Colspan disesuaikan --}}
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
