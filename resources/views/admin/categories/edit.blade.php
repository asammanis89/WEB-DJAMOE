@extends('admin.layouts.app')

@section('title', 'Edit Kategori')
@section('content_header_title', 'Edit Kategori')

@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Kategori</h3>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                    value="{{ old('category_name', $category->category_name) }}" 
                    required
                >
                @error('category_name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Gambar Kategori -->
            <div class="form-group">
                <label for="image_url">Gambar Kategori</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $category->image_url) }}" alt="Current Image" class="img-thumbnail" width="150">
                </div>
                <input 
                    type="file" 
                    id="image_url" 
                    name="image_url" 
                    class="form-control @error('image_url') is-invalid @enderror"
                    accept="image/*"
                >
                <small class="form-text text-muted">
                    Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG, JPEG.
                </small>
                @error('image_url')
                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
