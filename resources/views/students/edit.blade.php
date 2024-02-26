@extends('layout')

@section('title', 'student')

@section('content')
<form>
    <div class="form-group">
      <label for="nis">NIS</label>
      <input type="text" name="nis" class="form-control" id="nis" value="{{ $student->nis }}">
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" value="{{ $student->nama }}">
    </div>
    <div class="form-group">
      <label for="umur">Umur</label>
      <input type="number" name="umur" class="form-control" id="umur" value="{{ $student->umur }}">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" class="form-control" id="alamat">{{ $student->alamat }}</textarea>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="pria">
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
      <button type="button" id="btn-update" class="btn btn-warning">Update Data</button>
    </div>
</form>

@endsection

@push('scripts')
<script>
var gender = "{{ $student->gender }}";
var genderSelected = "";
if ($('#gender1').val() == gender) {
    $('#gender1').prop('checked', true);
}else{
    $('#gender2').prop('checked', true);
}

$(document).ready(
    function(){
        $('#btn-update').click(function(){
            $.ajax({
                url: "{{ url('api/student/update').'/'.$student->id }}",
                type: "PUT",
                data: {
                    nama: $('#nama').val(),
                    nis: $('#nis').val(),
                    alamat: $('#alamat').val(),
                    umur: $('#umur').val(),
                    gender: $('#gender1').prop('checked') ? $('gender1').val() : $('gender2').val(),
                    class_id: $('#kelas').val(),
                },
                success: function(){
                    alert("Berhasil Update Data");
                    location.href = "{{ url('student') }}"
                },
                error: function(res){
                    console.log(res);
                }

            });
        })
    }
);

</script>
@endpush
