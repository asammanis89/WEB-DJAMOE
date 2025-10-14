@extends('admin.layouts.app')

@section('title', 'Tambah Flyer')
@section('content_header_title', 'Tambah Flyer Baru')

@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Upload Flyer (Preview)</h3>
    </div>
    
    <!-- Form untuk menyimpan flyer -->
    <form action="{{ route('admin.flyers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="image_url">Gambar Flyer</label>
                <input type="file" name="image_url" id="image_url" class="form-control" onchange="previewImage(event)" required>
                
                <!-- Preview gambar -->
                <img id="preview" src="#" alt="Preview Flyer" style="max-width: 300px; display: none; margin-top: 10px;">
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.flyers.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<!-- Script untuk preview gambar sebelum submit -->
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
