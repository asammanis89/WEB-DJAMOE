@extends('adminlte::page')

@section('title', 'Tambah Artikel Baru')

@section('content_header')
    <h1>Tambah Artikel Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Sub Judul (Teks besar di gambar)</label>
                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" value="{{ old('subtitle') }}" required>
                @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" required>{{ old('description') }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" required>
                        <label class="custom-file-label" for="image">Pilih file</label>
                    </div>
                </div>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    // Inisialisasi plugin untuk menampilkan nama file pada input file bootstrap
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@stop

