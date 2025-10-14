@extends('admin.layouts.app')
@section('title', 'Tambah Cerita')
@section('content_header_title', 'Tambah Cerita Baru')

@section('main-content')
<div class="card card-primary">
    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="year_text">Teks Tahun (Contoh: AWAL MULA (1988))</label>
                <input type="text" class="form-control" id="year_text" name="year_text" value="{{ old('year_text') }}" required>
            </div>
            <div class="form-group">
                <label for="title">Judul Cerita</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required>
                    <label class="custom-file-label" for="image">Pilih file...</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection