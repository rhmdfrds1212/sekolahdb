@extends('layout.main')

@section('title','TAMBAH JURUSAN')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">Form Tambah Jurusan</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('jurusan.store') }}">
        @csrf
        <div class="col-12 ">
          <label for="singkatan" class="form-label">Singkatan</label>
          <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukan Singkatan Jurusan">
        </div>
        <div class="col-12 ">
          <label for="nama" class="form-label">Nama Jurusan</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Jurusan">
        </div>
        <div class="col-12 ">
          <label for="pimpinan" class="form-label">Pimpinan Jurusan</label>
          <input type="text" class="form-control" id="pimpinan" name="pimpinan" placeholder="Masukan Pimpinan Jurusan">
        </div>
        <div class="col-12 ">
          <label for="deskripsi" class="form-label">Deskripsi Jurusan</label>
          <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Jurusan">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('jurusan') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection