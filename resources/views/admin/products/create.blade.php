@extends('admin.layouts.app')

@section('title', 'Tambah Produk')
@section('content_header_title', 'Tambah Produk Baru')

@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Formulir Tambah Produk</h3></div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="product_name">Nama Produk</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
                @error('product_name')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>

            {{-- KOLOM DESKRIPSI BARU --}}
            <div class="form-group">
                <label for="description">Deskripsi Produk</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label for="category_id">Kategori Produk</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" step="any" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label for="image_url">Gambar Produk</label>
                {{-- MENGGANTI INPUT FILE MENJADI INPUT STANDAR --}}
                <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" required>
                @error('image_url')<span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_bestseller" name="is_bestseller" value="1" {{ old('is_bestseller') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_bestseller">Jadikan Produk Terlaris (Bestseller)</label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

