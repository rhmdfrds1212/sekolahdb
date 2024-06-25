@extends('layout.main')

@section('title', 'EKSTRAKULIKULER')

@section('content')
<h1 class="text-center">EKTRAKULIKULER</h1>
<a href="{{ route('eskul.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Eskul</a>
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th class="col text-center">Kode Eskul</th>
      <th class="col text-center">Nama Eskul</th>
      <th class="col text-center">Pelatih</th>
      <th class="col text-center">Tanggal Resmi</th>
      <th class="col text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($eskul as $item)
        <tr>
          <td class="text-center">
            {{ $item['kode_eskul'] }}
          </td>
          <td class="text-center">
            {{ $item['nama'] }}
          </td>
          <td class="text-center">
            {{ $item['pelatih'] }}
          </td>
          <td class="text-center">
            {{ $item['tanggal_resmi'] }}
          </td>
          <td class="text-center">
            <form action="{{route('eskul.destroy', $item["id"])}}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
              <a href="{{route('eskul.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-3">Edit</a>
            </form>
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