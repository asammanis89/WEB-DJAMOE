@extends('adminlte::page')

@section('title', 'Manajemen Artikel')

@section('content_header')
    <h1>Manajemen Artikel (Aktivitas)</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Artikel</h3>
        <div class="card-tools">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Artikel Baru
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if (session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 150px">Gambar</th>
                    <th>Judul</th>
                    <th>Sub Judul</th>
                    <th style="width: 120px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="width: 120px; height: auto; object-fit: cover;">
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->subtitle }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-info btn-xs">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada artikel ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $articles->links() }}
    </div>
</div>
@stop

