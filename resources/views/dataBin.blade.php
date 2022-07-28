@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($scan) --}}
    <div class="row">
        <div class="form-group col-md-6">

            <form action="" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputEmail4">Cell Series Number</label>
                        <input type="text" class="form-control" id="cell_sern_scan" name="cell_sern_scan"
                            placeholder="Scan Cell Series Number" value="{{ $scan->cell_sern }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">OCVB (V)</label>
                        <input type="text" class="form-control" id="v_gr_scan" name="v_gr_scan" placeholder="OCVB"
                            value="{{ $scan->v_gr }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">IMPB</label>
                        <input type="text" class="form-control" id="v_gr_scan" name="ir_gr_scan" placeholder="IMPB"
                            value="{{ $scan->ir_gr }}" readonly>
                    </div>
                </div>

                <br>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <br>
                {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
            </form>
        </div>

        <div class="form-group col-md-6">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Vendor Cell Series Number</label>
                    <input type="text" class="form-control" id="db_cell_sern" placeholder="Vendor Cell Series Numbe"
                        value="{{ $scan->cell_sern }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor OCVB (V)</label>
                    <input type="text" class="form-control" id="db_v_po" placeholder="Vendor OCVB (V)"
                        value="{{ $scan->v_po }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor IMPB</label>
                    <input type="text" class="form-control" id="db_ir_po" name="db_ir_po" placeholder="IMPB"
                        value="{{ $scan->ir_po }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor Carton Series Number </label>
                    <input type="text" class="form-control" id="db_crtn_sern" placeholder="Vendor Carton Series Number"
                        value="{{ $scan->crtn_sern }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor BIN</label>
                    <input type="text" class="form-control" id="db_bin" placeholder="Vendor BIN"
                        value="{{ $scan->bin }}" readonly>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
