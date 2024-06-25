@extends('layout.main')

@section('title', 'SISWA')

@section('content')
<h1 class="text-center">SISWA</h1>
<a href="{{ route('siswa.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Siswa</a>
<div class="table-responsive pt-3">
  <table class="table table-bordered border-primary">
    <thead>
      <tr>
        <th class="col text-center">Foto</th>
        <th class="col text-center">NISN</th>
        <th class="col text-center">Nama Siswa</th>
        <th class="col text-center">Jenis Kelamin</th>
        <th class="col text-center">Alamat</th>
        <th class="col text-center">Jurusan</th>
        <th class="col text-center">Kelas</th>
        <th class="col text-center">Ekstrakulikuler</th>
        <th class="col text-center">Guru Pembimbing</th>
        <th class="col text-center">Tempat Lahir</th>
        <th class="col text-center">Tanggal Lahir</th>
        <th class="col text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswa as $item)
          <tr>
            <td class="text-center ">
              <img src="{{ url('fotosiswa/'.$item['url_siswa']) }}" class="img-fluid" style="max-width:50px;">
            </td>
            <td class="text-center">
              {{ $item['nisn'] }}
            </td>
            <td class="text-center">
              {{ $item['nama'] }}
            </td>
            <td class="text-center">
              {{ $item['jenis_kelamin'] }}
            </td>
            <td class="text-center">
              {{ $item['alamat'] }}
            </td>
            <td class="text-center">
              {{ $item['jurusan']['singkatan'] }}
            </td>
            <td class="text-center">
              {{ $item['kelas']['nama'] }}
            </td>
            <td class="text-center">
              {{ $item['eskul']['nama'] }}
            </td>
            <td class="text-center">
              {{ $item['guru']['nama'] }}
            </td>
            <td class="text-center">
              {{ $item['tempat_lahir'] }}
            </td>
            <td class="text-center">
              {{ $item['tanggal_lahir'] }}
            </td>
            <td class="text-center">
              <form action="{{route('siswa.destroy', $item["id"])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                <a href="{{route('siswa.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-5">Edit</a>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
  <script>
    Swal.fire({
    title: "Good job!",
    text: "{{session('success')}}",
    icon: "success"
    });
  </script>
@endif
<!-- confirm dialog -->
<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       let form =  $(this).closest("form");
       let name = $(this).data("name");
       event.preventDefault();
       Swal.fire({
         title: " Yakin Mau di hapus ? ",
         text: "Data Kamu tidak akan bisa Kembali lagi!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Iya, Yakin!"
       })
       .then((willDelete) => {
         if (willDelete.isConfirmed) {
           form.submit();
         }
       });
   });

</script>
@endsection