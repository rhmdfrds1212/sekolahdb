@extends('layout.main')

@section('title', 'GURU')

@section('content')
<h1 class="text-center">GURU</h1>
@can('create', App\Guru::class)
  <a href="{{ route('guru.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Guru</a>
@endcan
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th class="col text-center">Foto</th>
      <th class="col text-center">NUPTK</th>
      <th class="col text-center">Nama Guru</th>
      <th class="col text-center">Jenis Kelamin</th>
      <th class="col text-center">Email</th>
      <th class="col text-center">Alamat</th>
      <th class="col text-center">Jurusan Ajaran</th>
      <th class="col text-center">Tempat Lahir</th>
      <th class="col text-center">Tanggal Lahir</th>
      <th class="col text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($guru as $item)
        <tr>
          <td class="text-center ">
            <img src="{{ url('fotoguru/'.$item['url_guru']) }}" class="img-fluid" style="max-width:50px;">
          </td>
          <td class="text-center">
            {{ $item['nuptk'] }}
          </td>
          <td class="text-center">
            {{ $item['nama'] }}
          </td>
          <td class="text-center">
            {{ $item['jenis_kelamin'] }}
          </td>
          <td class="text-center">
            {{ $item['email'] }}
          </td>
          <td class="text-center">
            {{ $item['alamat'] }}
          </td>
          <td class="text-center">
            {{ $item['jurusan']['singkatan'] }}
          </td>
          <td class="text-center">
            {{ $item['tempat_lahir'] }}
          </td>
          <td class="text-center">
            {{ $item['tanggal_lahir'] }}
          </td>
          <td class="text-center">
            @can('delete', $item)
              <form action="{{route('guru.destroy', $item["id"])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
              </form>
            @endcan
            @can('update', $item)
              <a href="{{route('guru.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-5">Edit</a>
            @endcan
          </td>
        </tr>
    @endforeach
  </tbody>
</table>
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