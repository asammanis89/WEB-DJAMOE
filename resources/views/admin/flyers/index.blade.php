@extends('admin.layouts.app')

@section('title', 'Flyers')
@section('content_header_title', 'Daftar Flyers')

@section('main-content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.flyers.create') }}" class="btn btn-primary">Tambah Flyer</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flyers as $flyer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$flyer->image_url) }}" width="150" alt="Flyer">
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.flyers.edit', $flyer) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.flyers.destroy', $flyer) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $flyers->links() }}
        </div>
    </div>
</div>
@endsection
