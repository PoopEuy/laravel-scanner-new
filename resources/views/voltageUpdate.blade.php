@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($voltage) --}}
    <div class="row">
        <div class="form-group col-md-6" id="dataMuncul1">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Cell Series Number</label>
                    <input type="text" class="form-control" id="cell_sern_scan" name="cell_sern_scan"
                        placeholder="Scan Cell Series Number" value="{{ $voltage->cell_sern }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">OCVB (V)</label>
                    <input type="text" class="form-control" id="v_gr_scan" name="v_gr_scan" placeholder="OCVB"
                        value="{{ $voltage->v_gr }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">IMPB</label>
                    <input type="text" class="form-control" id="ir_gr_scan" name="ir_gr_scan" placeholder="IMPB"
                        value="{{ $voltage->ir_gr }}" readonly>
                </div>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Search</button>
            <br>
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
                    <label for="inputPassword4">Vendor OCVB (V)</label>
                    <input type="text" class="form-control" id="db_v_po" placeholder="Vendor OCVB (V)"
                        value="{{ $voltage->v_po }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor IMPB</label>
                    <input type="text" class="form-control" id="db_ir_po" name="db_ir_po" placeholder="IMPB"
                        value="{{ $voltage->ir_po }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor Carton Series Number </label>
                    <input type="text" class="form-control" id="db_crtn_sern" placeholder="Vendor Carton Series Number"
                        value="{{ $voltage->crtn_sern }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Vendor BIN</label>
                    <input type="text" class="form-control" id="db_bin" placeholder="Vendor BIN"
                        value="{{ $voltage->bin }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Check At</label>
                    <input type="text" class="form-control" id="d_test" placeholder="Check At "
                        value="{{ $voltage->d_test }}" readonly>
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
        var cookies_last;
        var dataUpdate = document.getElementById("d_test").value;
        var dataView1 = document.getElementById("dataMuncul1");
        var dataView2 = document.getElementById("dataMuncul2");
        getCookie()

        function getCookie() {
            var cookies = document.cookie
                .split(';')
                .map(cookie => cookie.split('='))
                .reduce((accumulator, [key, value]) => ({
                    ...accumulator,
                    [key.trim()]: decodeURIComponent(value)
                }), {});

            cookies_last = cookies.dataUpdateCookie;
            console.log("last Cookies = " + cookies_last);

            if (dataUpdate > cookies_last) {
                //Do something..
                // alert("Data Muncul!");
                dataView1.style.display = "block";
                dataView2.style.display = "block";
                noData.style.display = "none";
            } else {
                // alert("Data tidak Muncul!");
                dataView1.style.display = "none";
                dataView2.style.display = "none";
                noData.style.display = "block";
            }

            cetakCookies()
        }

        function cetakCookies() {

            var now = new Date();
            var time = now.getTime();
            time += 3600 * 1000;
            now.setTime(time);
            document.cookie =
                'dataUpdateCookie=' + dataUpdate +
                '; expires=' + now.toUTCString() +
                '; path=/';

            console.log("cookies = " + document.cookie)
        }

        setTimeout(function() {
            window.location.reload(1);
        }, 3000);
    </script>
@endsection
