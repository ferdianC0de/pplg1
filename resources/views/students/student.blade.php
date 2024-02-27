@extends('layout')

@section('title', 'student')

@section('content')
<a href="{{ route('student.create') }}"
class="btn btn-success">Tambah Data</a>

<table
  id="table"
  data-toggle="table"
  data-search="true"
  data-pagination="true"
  data-unique-id="id"
  >
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="nis">NIS</th>
      <th data-field="nama">Nama</th>
      <th data-field="get_class.nama">Kelas</th>
      <th data-formatter="buttonFormatter">Action</th>
    </tr>
  </thead>
</table>
@endsection

@push('scripts')
<script>
    $('#table').bootstrapTable({
        url: "{{ route('getAllStudent') }}",
        pagination: true,
        search: true
    })


    function buttonFormatter(value, row) {
        // console.log(row);
        return "<button class='btn btn-warning'>Edit</button> "+
        " <button class='btn btn-danger' data-id='"+row.id+"' onclick='deleteData(this)' >Delete</button>"
    }

    function deleteData(element){
        var id = $(element).data('id')
        console.log(id);

        $.ajax({
            url: "{{ url('api/student/delete').'/' }}"+id,
            type: 'DELETE',
            success: () => {
                alert('Delete Berhasil')
            },
            error: (err) => {
                console.log(err);
            }
        });





















        // var elm = $(element);
        // console.log(elm.data('id'));

        // Swal.fire({
        //     title: 'Apakah Kamu Yakin?',
        //     text: "ingin menghapus data ini!",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     cancelButtonText: 'TIDAK',
        //     confirmButtonText: 'YA, HAPUS!'
        // }).then((answer) => {
        //     if (answer.isConfirmed) {
        //         $.ajax({
        //             url: "{{ url('api/student/delete') }}/"+elm.data('id'),
        //             type: 'DELETE',
        //             success: (respons) => {
        //                 Swal.fire({
        //                     type: 'success',
        //                     icon: 'success',
        //                     title: `${respons}`,
        //                     showConfirmButton: false,
        //                     timer: 1000
        //                 });

        //                 $('#table').bootstrapTable('removeByUniqueId', elm.data('id'));
        //             },
        //             error: (err) => {
        //                 console.log(err);
        //             }
        //         });
        //     }
        // });

    }
  </script>
@endpush
