@extends('admin.layouts.app')
@section('title', 'Kelola Cerita Kami')
@section('content_header_title', 'Daftar Cerita Tentang Kami')

@section('main-content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Cerita</h3>
        <div class="card-tools">
            <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Cerita</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Teks Tahun</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($abouts as $about)
                <tr>
                    <td><img src="{{ asset('storage/' . $about->image) }}" class="img-thumbnail" width="150"></td>
                    <td>{{ $about->year_text }}</td>
                    <td>{{ $about->title }}</td>
                    <td>
                        <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-info btn-xs">Edit</a>
                        <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada cerita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection