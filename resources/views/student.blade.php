@extends('layouts.main')

@section('title', 'student')

@section('content')
<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-ajax="ajaxRequest"
  data-search="true"
  data-side-pagination="server"
  data-pagination="true">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="nis">NIS</th>
      <th data-field="nama">Nama</th>
      <th data-field="class_id">Kelas</th>
    </tr>
  </thead>
</table>
@endsection

@push('scripts')
<script>

    // your custom ajax request here
    function ajaxRequest(params) {

        var url = "{{ url('api/student/all') }}";
      $.get(url + '?' + $.param(params.data)).then(function (res) {
        params.success(res)

      })
    }
  </script>
@endpush
