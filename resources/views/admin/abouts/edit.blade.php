@extends('admin.layouts.app')
@section('title', 'Edit Cerita')
@section('content_header_title', 'Edit Cerita')

@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Cerita</h3>
    </div>
    <form action="{{ route('admin.abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="year_text">Teks Tahun (Contoh: AWAL MULA (1988))</label>
                <input type="text" class="form-control @error('year_text') is-invalid @enderror" id="year_text" name="year_text" value="{{ old('year_text', $about->year_text) }}" required>
                @error('year_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="title">Judul Cerita</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $about->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $about->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <div>
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Gambar saat ini" class="img-thumbnail mb-2" style="width: 200px;">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                    <label class="custom-file-label" for="image">Pilih file baru (opsional)</label>
                </div>
                 @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
    // Script untuk memperbarui label input file dengan nama file yang dipilih
    $(document).ready(function () {
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
    });
</script>
@endpush
