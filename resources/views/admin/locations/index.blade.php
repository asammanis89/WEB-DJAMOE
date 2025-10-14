@extends('admin.layouts.app')

@section('title', 'Kelola Lokasi')
@section('content_header_title', 'Daftar Lokasi Outlet')

@section('main-content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Lokasi</h3>
        <div class="card-tools">
            <a href="{{ route('admin.locations.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Lokasi</a>
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
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locations as $location)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address }}</td>
                    <td>{{ $location->phone_number ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.locations.edit', $location) }}" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.locations.destroy', $location) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data lokasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
