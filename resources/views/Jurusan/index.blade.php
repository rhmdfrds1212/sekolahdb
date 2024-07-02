@extends('layout.main')

@section('title', 'JURUSAN')

@section('content')
<h1 class="text-center">JURUSAN</h1>
@can('create', App\Jurusan::class)
  <a href="{{ route('jurusan.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Jurusan</a>
@endcan
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th class="col text-center">Singkatan Jurusan</th>
      <th class="col text-center">Nama Jurusan</th>
      <th class="col text-center">Pimpinan Jurusan</th>
      <th class="col text-center">Deskripsi Jurusan</th>
      <th class="col text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($jurusan as $item)
        <tr>
          <td class="text-center">
            {{ $item['singkatan'] }}
          </td>
          <td class="text-center">
            {{ $item['nama'] }}
          </td>
          <td class="text-center">
            {{ $item['pimpinan'] }}
          </td>
          <td class="text-center">
            {{ $item['deskripsi'] }}
          </td>
          <td class="text-center">
            @can('delete', $item)
              <form action="{{route('jurusan.destroy', $item["id"])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                <a href="{{route('jurusan.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-5">Edit</a>
              </form>
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
         title: " Yakin Mau di hapus? ",
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