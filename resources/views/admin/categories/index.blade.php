@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')
@section('content_header_title', 'Daftar Kategori')

@section('main-content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Kategori</h3>
        <div class="card-tools">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kategori</a>
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
                    <th style="width: 10px">No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    {{-- Menyesuaikan penomoran jika menggunakan paginasi --}}
                    <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                    <td>
                        @if($category->image_url)
                            <img src="{{ asset('storage/' . $category->image_url) }}" alt="{{ $category->category_name }}" class="img-thumbnail" width="100">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $category->category_name }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{-- Link Paginasi --}}
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
