@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($voltage) --}}

    @if ($voltage != null)
        <div class="row">
            <div class="form-group col-md-6" id="dataMuncul1">
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputEmail4">Cell Series Number</label>
                        <input type="text" class="form-control" id="cell_sern_scan" name="cell_sern_scan"
                            placeholder="Scan Cell Series Number" value="{{ $voltage->cell_sern }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">V_gr (V)</label>
                        <input type="text" class="form-control" id="v_gr_scan" name="v_gr_scan" placeholder="OCVB"
                            value="{{ $voltage->v_gr }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">IR_gr (uOhm)</label>
                        <input type="text" class="form-control" id="ir_gr_scan" name="ir_gr_scan" placeholder="IMPB"
                            value="{{ $voltage->ir_gr }}" readonly>
                    </div>

                    <div class="form-group">
                        <h1 class="display-5" style="text-align: left;">Status V Test = <strong
                                id="vstatus">{{ $voltage->v_status }}</strong> </h1>
                        {{-- <h2 id="vstatus" class="display-1" style="text-align: left; font-size:3rem;">
                        {{ $voltage->v_status }}</h2> --}}
                    </div>

                    <div class="form-group">
                        <h1 class="display-5" style="text-align: left;">Status IR Test = <strong
                                id="irstatus">{{ $voltage->ir_status }}</strong> </h1>
                        {{-- <h2 id="irstatus" class="display-1" style="text-align: left; font-size:3rem;">
                        {{ $voltage->ir_status }}</h2> --}}
                    </div>


                </div>

                <br>
                {{-- <button type="submit" id="submit" class="btn btn-primary">Search</button> --}}
                {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
                <br>
            </div>

            <div class="form-group col-md-6">
                <div class="form-row" id="dataMuncul2">
                    <div class="form-group">
                        <label for="inputEmail4">Vendor Cell Series Number</label>
                        <input type="text" class="form-control" id="db_cell_sern" placeholder="Vendor Cell Series Numbe"
                            value="{{ $voltage->cell_sern }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">V_po (V)</label>
                        <input type="text" class="form-control" id="db_v_po" placeholder="Vendor OCVB (V)"
                            value="{{ $voltage->v_po }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">IR_po (uOhm)</label>
                        <input type="text" class="form-control" id="db_ir_po" name="db_ir_po" placeholder="IMPB"
                            value="{{ $voltage->ir_po }}" readonly>
                    </div>
                    {{-- <div class="form-group">
                    <label for="inputPassword4">Vendor Carton Series Number </label>
                    <input type="text" class="form-control" id="db_crtn_sern" placeholder="Vendor Carton Series Number"
                        value="{{ $voltage->crtn_sern }}" readonly>
                </div> --}}
                    {{-- <div class="form-group">
                    <label for="inputPassword4">Vendor BIN</label>
                    <input type="text" class="form-control" id="db_bin" placeholder="Vendor BIN"
                        value="{{ $voltage->bin }}" readonly>
                </div> --}}
                    <div class="form-group" style="display: none">
                        <label for="inputPassword4">Checked At</label>
                        <input type="text" class="form-control" id="updated_at" placeholder="Check At "
                            value="{{ $voltage->updated_at }}" readonly>
                    </div>
                    <div class="form-group">
                        <h1 class="display-5" style="text-align: left;">Vendor BIN</h1>
                        <h2 id="irstatus" class="display-1" style="text-align: left; font-size:3rem;">
                            <strong>{{ $voltage->bin }}
                        </h2></strong>

                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="row" id="noData" style="display: none">
            <div class="form-group col-md-12">
                <h1 class="display-1" style="text-align: center;">Tidak Ada Data Terbaru</h1>
            </div>
        </div>
        <script>
            var voltage_data = @json($voltage);
            // ...
        </script>
        <script src="js/voltageUpdate.js"></script>
    @else
        <div class="row" id="noData1">
            <div class="form-group col-md-12">
                <h1 class="display-1" style="text-align: center;">Tidak Ada Data Terbaru (Null)</h1>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.reload(1);
            }, 1500);
        </script>
    @endif
@endsection
