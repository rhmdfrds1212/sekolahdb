@extends('layout.main')

@section('title', 'KELAS')

@section('content')
<h1 class="text-center">KELAS</h1>
@can('create', App\Kelas::class)
<a href="{{ route('kelas.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Kelas</a>
@endcan
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th class="col text-center">Jurusan</th>
      <th class="col text-center">Tingkat Kelas</th>
      <th class="col text-center">Nama Kelas</th>
      <th class="col text-center">Wali Kelas</th>
      <th class="col text-center">Jumlah Siswa</th>
      <th class="col text-center">Motto Kelas</th>
      <th class="col text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kelas as $item)
        <tr>
          <td class="text-center">
            {{ $item['jurusan']['singkatan'] }}
          </td>
          <td class="text-center">
            {{ $item['no'] }}
          </td>
          <td class="text-center">
            {{ $item['nama'] }}
          </td>
          <td class="text-center">
            {{ $item['wali'] }}
          </td>
          <td class="text-center">
            {{ $item['jumlah'] }}
          </td>
          <td class="text-center">
            {{ $item['motto'] }}
          </td>
          <td class="text-center">
            @can('delete', $item)
              <form action="{{route('kelas.destroy', $item["id"])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $item['nama'] }}">Hapus</button>
                <a href="{{route('kelas.edit', $item["id"])}}" class="btn btn-sm btn-warning col-lg-5">Edit</a>
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
         title: " Yakin mau di hapus ? ",
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