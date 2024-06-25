@extends('layout.main')

@section('title','EDIT JURUSAN')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">From Edit Jurusan</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('jurusan.update', $jurusan['id']) }}">
        @method('PUT')
        @csrf
        <div class="col-12 ">
          <label for="singkatan" class="form-label">Singkatan</label>
          <input type="text" class="form-control" id="singkatan" name="singkatan" value="{{old('singkatan') ? old('singkatan'): $jurusan['singkatan'] }}" placeholder="Masukan Singkatan Jurusan">
        </div>
        <div class="col-12 ">
          <label for="nama" class="form-label">Nama Jurusan</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $jurusan['nama'] }}" placeholder="Masukan Nama Jurusan">
        </div>
        <div class="col-12 ">
          <label for="pimpinan" class="form-label">Pimpinan Jurusan</label>
          <input type="text" class="form-control" id="pimpinan" name="pimpinan" value="{{old('pimpinan') ? old('pimpinan'): $jurusan['pimpinan'] }}" placeholder="Masukan Pimpinan Jurusan">
        </div>
        <div class="col-12 ">
          <label for="deskripsi" class="form-label">Deskripsi Jurusan</label>
          <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{old('deskripsi') ? old('deskripsi'): $jurusan['deskripsi'] }}" placeholder="Masukan Deskripsi Jurusan">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('jurusan') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection