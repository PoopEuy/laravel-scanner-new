

@extends('layouts.main')

@section('container')
<h1>Halaman Scanner</h1>
    <h3>About me</h3>
    <p>{{ $name }}</p>
    <p>{{ $email }}</p>
    <img src="img/{{  $image }}" alt="" width="280" class="img-thumbnail rounded-circle">

@endsection
