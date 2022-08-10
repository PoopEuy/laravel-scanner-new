@extends('layouts.main')

@section('container')
    <div class="content">

        <div class="form-group col-md-12">
            {{-- <h1 class="centered-view">Home</h1> --}}
            <img class="centered-view" src="img/{{ $image }}" alt="" width="720">
            {{-- <h1 class="display-1" style="text-align: center;">Tidak Ada Data Terbaru</h1> --}}
        </div>
    </div>
@endsection
