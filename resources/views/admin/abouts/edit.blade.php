@extends('admin.layouts.app')
@section('title', 'Edit Cerita')
@section('content_header_title', 'Edit Cerita')

@section('main-content')
<div class="card card-primary">
    <form action="{{ route('admin.abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="year_text">Teks Tahun</label>
                <input type="text" class="form-control" id="year_text" name="year_text" value="{{ old('year_text', $about->year_text) }}" required>
            </div>
            <div class="form-group">
                <label for="title">Judul Cerita</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $about->title) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $about->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="mb-2"><img src="{{ asset('storage/' . $about->image) }}" class="img-thumbnail" width="200"></div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Pilih file baru...</label>
                </div>
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection