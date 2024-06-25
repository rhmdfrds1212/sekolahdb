@extends('layout.main')

@section('title','EDIT EKSTRAKULIKULER')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">Form Edit Ekstrakulikuler</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('eskul.update', $eskul['id']) }}">
        @method('PUT')
        @csrf
        <div class="col-12 ">
          <label for="kode_eskul" class="form-label">Kode Eskul</label>
          <input type="text" class="form-control" id="kode_eskul" name="kode_eskul" value="{{old('kode_eskul') ? old('kode_eskul'): $eskul['kode_eskul'] }}" placeholder="Masukan Kode Eskul">
        </div>
        <div class="col-12 ">
          <label for="nama" class="form-label">Nama Eskul</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $eskul['nama'] }}" placeholder="Masukan Nama Eskul">
        </div>
        <div class="col-12 ">
          <label for="pelatih" class="form-label">Pelatih Eskul</label>
          <input type="text" class="form-control" id="pelatih" name="pelatih" value="{{old('pelatih') ? old('pelatih'): $eskul['pelatih'] }}" placeholder="Masukan Pelatih Eskul">
        </div>
        <div class="col-12 ">
          <label for="tanggal_resmi" class="form-label">Tanggal Resmi</label>
          <input type="date" class="form-control" id="tanggal_resmi" name="tanggal_resmi" value="{{old('tanggal_resmi') ? old('tanggal_resmi'): $eskul['tanggal_resmi'] }}" placeholder="Masukan Tanggal Resmi">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('eskul') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection