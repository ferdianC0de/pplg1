@extends('layout')

@section('title', 'student')

@section('content')
<form>
    <div class="form-group">
      <label for="nis">NIS</label>
      <input type="text" name="nis" class="form-control" id="nis">
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="form-group">
      <label for="umur">Umur</label>
      <input type="number" name="umur" class="form-control" id="umur">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" class="form-control" id="alamat"></textarea>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="pria" checked>
            <label class="form-check-label" for="gender1">
                Pria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="wanita">
            <label class="form-check-label" for="gender2">
              Wanita
            </label>
          </div>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <select class="form-control" name="kelas" id="kelas">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>

    <div class="form-group">
      <button type="button" id="btn-create" class="btn btn-success">Tambah Data</button>
    </div>
</form>

@endsection

@push('scripts')
<script>

$(document).ready(
    function(){
        $('#btn-create').click(function(){
            $.ajax({
                url: "{{ url('api/student/create') }}",
                type: "POST",
                data: {
                    nama: $('#nama').val(),
                    nis: $('#nis').val(),
                    alamat: $('#alamat').val(),
                    umur: $('#umur').val(),
                    class_id: $('#kelas').val(),
                },
                success: function(){
                    alert("Berhasil Tambah Data")
                },
                error: function(res){
                    console.log(res);
                }

            });
        })
    }
);













// $( document ).ready(function() {

//   $('#btn-create').click(() => {

















//     //   $.ajax({
//     //       type: "POST",
//     //       url: "{{ route('student.store') }}",
//     //       data: {
//     //           _token : "{{ csrf_token() }}",
//     //           nama : $('#nama').val(),
//     //           nis : $('#nis').val(),
//     //           umur : $('#umur').val(),
//     //           alamat : $('#alamat').val(),
//     //           gender : $('#gender1').checked ? "pria" : "wanita",
//     //           class_id : $('#kelas').val(),
//     //       },
//     //       success : (response) => {
//     //           window.location.replace("{{ route('student.all') }}");
//     //             // Swal.fire({
//     //             //     type: 'success',
//     //             //     icon: 'success',
//     //             //     title: `${response.message}`,
//     //             //     showConfirmButton: false,
//     //             //     timer: 3000
//     //             // }).then(() => {
//     //             // });
//     //         },
//     //       error: (err) => {
//     //           alert("error : "+err)
//     //       }
//     //   });

//   })
// });


</script>
@endpush
