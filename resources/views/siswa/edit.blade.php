@extends('layout.main')

@section('title','FORM EDIT SISWA')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">Form Edit Siswa</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('siswa.update', $siswa['id']) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-12 ">
            <label for="nisn" class="form-label">Nisn Siswa</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{old('nisn') ? old('nisn'): $siswa['nisn'] }}" placeholder="Masukan Nisn Siswa" readonly>
        </div>
        <div class="col-12 ">
            <label for="nama" class="form-label">Nama siswa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $siswa['nama'] }}" placeholder="Masukan Nama Siswa">
        </div>
        <div class="col-12 ">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin') ? old('jenis_kelamin'): $siswa['jenis_kelamin'] }}" placeholder="Masukan Jenis Kelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="col-12 ">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat') ? old('alamat'): $siswa['alamat'] }}" placeholder="Masukan Alamat Siswa">
        </div>
        <div class="col-12 ">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select class="form-control" id="jurusan_id" name="jurusan_id" value="{{old('jurusan_id') ? old('jurusan_id'): $siswa['jurusan_id'] }}" placeholder="Masukan Jurusan">
                @foreach ($jurusan as $items)
                    <option value="{{$items['id']}}">
                        {{$items['singkatan']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 ">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select class="form-control" id="kelas_id" name="kelas_id" value="{{old('kelas_id') ? old('kelas_id'): $siswa['kelas_id'] }}" placeholder="Masukan Kelas">
                @foreach ($kelas as $items)
                    <option value="{{$items['id']}}">
                        {{$items['nama']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 ">
            <label for="eskul_id" class="form-label">Ekstrakulikuler</label>
            <select class="form-control" id="eskul_id" name="eskul_id" value="{{old('eskul_id') ? old('eskul_id'): $siswa['eskul_id'] }}" placeholder="Masukan Eskul">
                @foreach ($eskul as $items)
                    <option value="{{$items['id']}}">
                        {{$items['nama']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 ">
            <label for="guru_id" class="form-label">Guru Pembimbing</label>
            <select class="form-control" id="guru_id" name="guru_id" value="{{old('guru_id') ? old('guru_id'): $siswa['guru_id'] }}" placeholder="Masukan Guru">
                @foreach ($guru as $items)
                    <option value="{{$items['id']}}">
                        {{$items['nama']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 ">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') ? old('tempat_lahir'): $siswa['tempat_lahir'] }}" placeholder="Masukan Tempat Lahir">
        </div>
        <div class="col-12 ">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') ? old('tanggal_lahir'): $siswa['tanggal_lahir'] }}" placeholder="Masukan Tanggal Lahir">
        </div>
        <div class="col-12">
            <label for="url_siswa">Foto</label>
            <input type="file" class="form-control" name="url_siswa">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('siswa') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection