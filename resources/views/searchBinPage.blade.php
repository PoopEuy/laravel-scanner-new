@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($scan) --}}
    @php
    // header('Refresh:1;');
    @endphp
    <div class="row">
        <div class="form-group col-md-6">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Cell Series Number</label>
                    <input type="text" class="form-control" id="cell_sern_scan" name="cell_sern_scan"
                        placeholder="Scan Cell Series Number" value="">
                </div>
            </div>
            <br>
            <br>
            <div class="alert alert-warning" role="alert" id="alert-error" style="display: none">
                QR Code/BIN Not Found
            </div>
            <br>

            <button type="submit" id="submit" class="btn btn-primary">Search</button>
            {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
        </div>

        <div class="form-group col-md-6" id="readBin" style="display: block">

        </div>

    </div>

    <script>
        // function getBinData() {
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('searchBinData') }}",
        //         data: "cell_sern_scan=" + cell_sern_scan,

        //     })
        // }

        // function read() {
        //     $.get("{{ url('') }}")
        // }
        $("#cell_sern_scan").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#submit").click();
            }
        });
        $('body').on('click', '#submit', function() {
            var cell_sern_scan = $('#cell_sern_scan').val();
            var aler_error = document.getElementById("alert-error");
            var readBin_disp = document.getElementById("readBin");
            console.log("Onclick read data : " + cell_sern_scan);
            // $.get("{{ url('searchBinData') }}/" + cell_sern_scan, {}, function(data, status) {
            //     $("#readBin").html(data);
            // });

            $.ajax({
                type: "get",
                url: "{{ url('searchBinData') }}/" + cell_sern_scan,
                // data: "name=" + name,
                success: function(data) {
                    $("#readBin").html(data);

                    aler_error.style.display = "none";
                    readBin_disp.style.display = "block";
                    setTimeout(function() {
                        cell_sern_scan = document.getElementById('cell_sern_scan');
                        cell_sern_scan.value = '';
                    }, 500);


                },
                error: function(xhr, status, error) {
                    aler_error.style.display = "block";
                    readBin_disp.style.display = "none";
                    setTimeout(function() {
                        cell_sern_scan = document.getElementById('cell_sern_scan');
                        cell_sern_scan.value = '';
                    }, 500);
                }
            });
        })
    </script>
@endsection
