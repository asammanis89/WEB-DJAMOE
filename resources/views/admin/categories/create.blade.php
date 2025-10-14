@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')
@section('content_header_title', 'Tambah Kategori Baru')

@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Kategori</h3>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            
            <!-- Nama Kategori -->
            <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <input 
                    type="text" 
                    id="category_name" 
                    name="category_name" 
                    class="form-control @error('category_name') is-invalid @enderror" 
                    placeholder="Masukkan nama kategori"
                    value="{{ old('category_name') }}" 
                    required
                >
                @error('category_name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Gambar Kategori -->
            <div class="form-group">
                <label for="image_url">Gambar Kategori</label>
                <input 
                    type="file" 
                    id="image_url" 
                    name="image_url" 
                    class="form-control @error('image_url') is-invalid @enderror"
                    accept="image/*"
                >
                <small class="form-text text-muted">
                    Format yang diperbolehkan: JPG, PNG, JPEG.
                </small>
                @error('image_url')
                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                 Batal
            </a>
        </div>
    </form>
</div>
@endsection
