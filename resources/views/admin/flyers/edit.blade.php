@extends('admin.layouts.app')

@section('title', 'Edit Flyer')
@section('content_header_title', 'Edit Flyer')

@section('main-content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Form Edit Flyer</h3>
    </div>
    {{-- 1. Tambahkan action, method, dan enctype untuk upload file --}}
    <form action="{{ route('admin.flyers.update', $flyer) }}" method="POST" enctype="multipart/form-data">
        @csrf           {{-- 2. Tambahkan CSRF Token untuk keamanan --}}
        @method('PUT')   {{-- 3. Tambahkan method PUT untuk update --}}

        <div class="card-body">
            <div class="form-group">
                <label>Gambar Flyer Saat Ini</label>
                <img src="{{ asset('storage/'.$flyer->image_url) }}" width="150" class="d-block mb-2" alt="Flyer">
            </div>

            <div class="form-group">
                <label for="image_url">Ganti Gambar Flyer (Opsional)</label>
                {{-- 4. Hapus 'disabled' dan sesuaikan 'name' --}}
                <input type="file" name="image_url" id="image_url" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>
        </div>
        <div class="card-footer">
            {{-- 5. Tambahkan tombol Update dan ganti tombol Kembali --}}
            <button type="submit" class="btn btn-primary">Update Flyer</button>
            <a href="{{ route('admin.flyers.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection