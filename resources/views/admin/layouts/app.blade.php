@extends('adminlte::page')

{{-- Bagian ini akan mengisi judul halaman di tab browser --}}
@section('title', 'Admin Panel | Djamoe')

{{-- Bagian ini akan mengisi judul di bagian atas konten halaman --}}
@section('content_header')
    <h1 class="m-0 text-dark">@yield('content_header_title', 'Dashboard')</h1>
@stop

{{-- Ini adalah bagian utama konten halaman, di mana tabel dan form akan muncul --}}
@section('content')
    @yield('main-content')
@stop

{{-- Bagian ini untuk menambahkan file CSS kustom per halaman (jika diperlukan) --}}
@section('css')
    {{-- Contoh: <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

{{-- Bagian ini untuk menambahkan file JavaScript kustom per halaman --}}
@section('js')
<script>
    // Inisialisasi plugin untuk menampilkan nama file pada input file bootstrap
    // Ini sangat berguna untuk semua form yang memiliki upload gambar
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>
@stop
