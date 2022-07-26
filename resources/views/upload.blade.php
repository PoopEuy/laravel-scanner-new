@extends('layouts.main')

@section('container')
{{-- {{ $scan }} --}}

<div class="row">
<div class="form-group col-md-6">
<form method="post" enctype="multipart/form-data" action="/upload_aksi.php">
  <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="file_excell" required="required">
</div>
  <br>
  {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
  <button type="submit" name="upload" value="Import" class="btn btn-primary">Upload Data</button>
</form>
</div>


@endsection
