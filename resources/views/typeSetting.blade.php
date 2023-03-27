@extends('layouts.main')

@section('container')
    <div id="frame1">
        <div id="typeSetting">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form  action="/createMtype" method="post" enctype="multipart/form-data" method="POST">
                
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1 class="display-1" style="text-align: center;">Type Battery & PO Setting </h1>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Type Battery</label>
                        <input type="text" class="form-control rounded-top @error('type_batt') is-invalid @enderror" id="type_batt" name="type_batt" placeholder="Type Batt" value="{{ old('type_batt') }}" required>
                        @error('type_batt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>

                <div class="row row-margin-top">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">PO Name</label>
                        <input type="text" class="form-control rounded-top @error('po') is-invalid @enderror" id="po" name="po" placeholder="PO Name" value="{{ old('po') }}" required>
                        @error('po')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>
    <script>
        
    </script>
@endsection
