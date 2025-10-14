@extends('admin.layouts.app')

@section('title', 'Edit Lokasi')
@section('content_header_title', 'Edit Lokasi Outlet')

@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Formulir Edit Lokasi</h3></div>
    <form action="{{ route('admin.locations.update', $location) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Outlet</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $location->name) }}" required>
                @error('name')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat Lengkap</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $location->address) }}</textarea>
                @error('address')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group">
                <label for="phone_number">No. Telepon (Opsional)</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $location->phone_number) }}">
                @error('phone_number')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group">
                <label for="google_maps_url">URL Google Maps (Opsional)</label>
                <input type="url" class="form-control @error('google_maps_url') is-invalid @enderror" id="google_maps_url" name="google_maps_url" value="{{ old('google_maps_url', $location->google_maps_url) }}">
                @error('google_maps_url')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
