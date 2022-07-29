@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="form-group col-md-6">
            <form action="{{ url('vendorVoltIr/') }}" method="post">
                @method('post')
                @csrf
                <div class="form-group col-md-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputEmail4">Scan QR COde</label>
                            <input type="text" class="form-control" id="cell_sern_scan" name="cell_sern_scan"
                                placeholder="Scan QR COde Here" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">OCVB (V)</label>
                            <input type="text" class="form-control" id="v_gr_scan" name="v_gr_scan"
                                placeholder="OCVB (V)" value="{{ $v_gr_scan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">IMPB</label>
                            <input type="text" class="form-control" id="ir_gr_scan" name="ir_gr_scan" placeholder="IMPB"
                                value="{{ $ir_gr_scan }}" readonly>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById("cell_sern_scan").focus();
        };
    </script>
@endsection
