@extends('adminlte::page')

@section('title', 'Edit Artikel')

@section('content_header')
    <h1>Edit Artikel: {{ $article->title }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $article->title) }}" placeholder="Contoh: Kelas Meracik Jamu" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Sub Judul</label>
                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" value="{{ old('subtitle', $article->subtitle) }}" placeholder="Teks yang tampil di atas gambar" required>
                @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Lengkap</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" required>{{ old('description', $article->description) }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="width: 200px;">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                        <label class="custom-file-label" for="image">Pilih file baru</label>
                    </div>
                </div>
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    // PERBAIKAN SCRIPT INPUT FILE
    document.addEventListener('DOMContentLoaded', function () {
        // Menggunakan jQuery yang sudah ada di AdminLTE
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        });
    });
</script>
@stop

