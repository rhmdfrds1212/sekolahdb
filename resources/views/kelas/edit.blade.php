@extends('layout.main')

@section('title','EDIT KELAS')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">Form Edit Kelas</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('kelas.update', $kelas['id']) }}">
        @method('PUT')
        @csrf
        <div class="col-12 ">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select class="form-control" id="jurusan_id" name="jurusan_id" value="{{old('jurusan_id') ? old('jurusan_id'): $kelas['jurusan_id'] }}" placeholder="Masukan Jurusan">
                @foreach ($jurusan as $items)
                    <option value="{{$items['id']}}">
                        {{$items['singkatan']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 ">
            <label for="no" class="form-label">Tingkatan Kelas</label>
            <select class="form-control" id="no" name="no" value="{{old('no') ? old('no'): $kelas['no'] }}" placeholder="Masukan Tingkatan Kelas">
                <option value="X">10</option>
                <option value="XI">11</option>
                <option value="XII">12</option>
            </select>
        </div>
        <div class="col-12 ">
            <label for="nama" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $kelas['nama'] }}" placeholder="Masukan Nama Kelas">
        </div>
        <div class="col-12 ">
            <label for="wali" class="form-label">Wali Kelas</label>
            <input type="text" class="form-control" id="wali" name="wali" value="{{old('wali') ? old('wali'): $kelas['wali'] }}" placeholder="Masukan Wali Kelas">
        </div>
        <div class="col-12 ">
            <label for="jumlah" class="form-label">Jumlah Siswa</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{old('jumlah') ? old('jumlah'): $kelas['jumlah'] }}" placeholder="Masukan Jumlah Siswa">
        </div>
        <div class="col-12 ">
            <label for="motto" class="form-label">Motto Kelas</label>
            <input type="text" class="form-control" id="motto" name="motto" value="{{old('motto') ? old('motto'): $kelas['motto'] }}" placeholder="Masukan Motto Kelas">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('jurusan') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection