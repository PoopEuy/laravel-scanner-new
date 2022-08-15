@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($voltage) --}}
    <div id="frame1">
        <div id="frame1_simbol">
            <div class="row" style="display: block">
                <div class="form-group col-md-12">
                    <h1 class="display-1" style="text-align: center;">Frame Model 2</h1>
                </div>
            </div>

            <div class="row binFrame">
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">First BIN = <strong id="firstBin"></strong> </h1>
                </div>
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">Current BIN = <strong id="currBin"></strong> </h1>
                </div>
            </div>

            <div class="row scanFrame">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Scan Battery QR</label>
                    <input type="text" class="form-control" id="batt_qr" name="batt_qr" placeholder="Scan Battery QR"
                        value="">
                    <br>
                    <button type="submit" id="cari_batt" class="btn btn-primary" style="display: none">Batt</button>

                    <div class="alert alert-warning" role="alert" id="frame_status" style="display:none">
                        Frame Data Saved Successfully
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Scan Frame QR</label>
                    <input type="text" class="form-control" id="frame_qr" name="frame_qr" placeholder="Scan Frame QR"
                        value="">
                    <br>
                    <button type="submit" id="cari_frame" class="btn btn-primary" style="display: none">Frame</button>

                    <button type="submit" id="save_frame" class="btn btn-primary" style="display: none">Save Frame</button>
                </div>

                <br>


            </div>
            <div class="row ">
                @php
                    $a = 'a';
                    $b = 'b';
                @endphp
                @for ($i = 1; $i < 4; $i++)
                    <div class="row col-md-4">
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$a" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$a " }} <i class="fa fa-caret-right"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$b" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$b " }} <i class="fa fa-caret-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row ">
                @php
                    $a = 'a';
                    $b = 'b';
                @endphp
                @for ($i = 6; $i > 3; $i--)
                    <div class="row col-md-4">
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$a" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        <i class="fa fa-caret-left"></i> {{ "$i$a " }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$b" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        <i class="fa fa-caret-left"></i> {{ "$i$b " }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row ">
                @php
                    $a = 'a';
                    $b = 'b';
                @endphp
                @for ($i = 7; $i < 10; $i++)
                    <div class="row col-md-4">
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$a" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$a " }} <i class="fa fa-caret-right"></i> </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$b" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$b " }} <i class="fa fa-caret-right"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row ">
                @php
                    $a = 'a';
                    $b = 'b';
                @endphp
                @for ($i = 12; $i > 9; $i--)
                    <div class="row col-md-4">
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$a" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        <i class="fa fa-caret-left"></i> {{ "$i$a " }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$b" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        <i class="fa fa-caret-left"></i> {{ "$i$b " }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row ">
                @php
                    $a = 'a';
                    $b = 'b';
                @endphp
                @for ($i = 13; $i < 16; $i++)
                    <div class="row col-md-4">
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$a" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$a " }} <i class="fa fa-caret-right"></i> </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i$b" }} style="background-color: black">
                                    <span style="font-size:30px;color:white;">
                                        {{ "$i$b " }} <i class="fa fa-caret-right"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>





            {{-- <button type="submit" id="submit" class="btn btn-primary">Search</button> --}}
        </div>

        <div class="content table-frame-update">
            <div class="card card-info card-outline">
                <div class="card-header">
                    {{-- <button type="submit" class="btn btn-primary" id="tambah_data">+ Add Data</button>
                    <button type="submit" class="btn btn-primary" id="save_data">Save</button> --}}
                </div>
                <div class="card-body">
                    <div class="content">
                        <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cell Serial</th>
                                    {{-- <th>Frame Serial</th> --}}
                                    <th>BIN</th>
                                    <th>Cell</th>
                                    {{-- <th>Aksi</th> --}}

                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    {{-- <td></td>
                                    <td class="cell_sern"></td>
                                    <td class="frame_sn"></td>
                                    <td class="bin"></td>
                                    <td><button class="btn-sm btn-danger" id="hapus"></button></td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <script src="js/frameScan.js"></script> --}}
    <script>
        var frame_qr_code;
        var batt_qr_code;
        let baris = 0;
        let cell_value = 1;
        let huruf = 'a';
        let scanCounter = 0
        var sern_before = new Array();
        let counter;

        $("#batt_qr").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#cari_batt").click();
            }
        });

        $('body').on('click', '#cari_batt', function() {


            batt_qr_code = document.getElementById("batt_qr").value;
            console.log("batt qr = " + batt_qr_code)
            console.log("frame_qr_code = " + frame_qr_code)

            searchBatt(batt_qr_code)

        })

        $("#frame_qr").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#cari_frame").click();
            }
        });

        $('body').on('click', '#cari_frame', function() {
            frame_qr_code = document.getElementById("frame_qr").value;

            if (!frame_qr_code.replace(/\s/g, '').length) {
                alert("Please Fill in the Frame Code First");
            } else {
                searchFrame(frame_qr_code);
            }


        })

        function searchBatt(batt_qr_code) {
            console.log("masuk fungsi")
            $.ajax({
                type: "get",
                url: "{{ url('getBattData') }}/" + batt_qr_code,
                // data: "name=" + name,
                success: function(frame_batt) {
                    nilai_cellSern = frame_batt.cell_sern;


                    if (nilai_cellSern != undefined) {
                        scanCounter = scanCounter + 1;
                        nilai_cellSern = frame_batt.cell_sern;
                        nilai_bin = frame_batt.bin;
                        nilai_cell = frame_batt.cell;
                        document.getElementById("currBin").textContent = nilai_bin;

                        if (scanCounter == 1) {
                            console.log("scan Counter 1")
                            nilai_firstBin = frame_batt.bin;
                            document.getElementById("firstBin").textContent = nilai_firstBin;
                        } else {
                            console.log("scan Counter bukan1")
                        }

                        binCheck();

                    } else {
                        alert("Data Not Found, Please Check Again !!");
                        document.getElementById("batt_qr").focus();
                        document.getElementById("batt_qr").value = '';
                    }

                },
                error: function(xhr, status, error) {}
            });
        }

        function binCheck() {
            document.getElementById("batt_qr").value = '';
            document.getElementById("batt_qr").focus();

            const isInArray = sern_before.includes(nilai_cellSern);
            console.log("BEFORE SERN = " + sern_before)
            console.log("BEFORE isInArray = " + isInArray)
            console.log("Cek Cell = " + nilai_cell)
            console.log("Nilai Bin = " + nilai_bin)

            //deklarasi baris



            //cek BIN dan validasi serial number agar tidak duplikat
            if (nilai_firstBin == nilai_bin && isInArray == false && nilai_cell == null && nilai_bin !=
                undefined) {

                if (huruf == 'a') {
                    input_cell = cell_value + huruf

                    console.log("HURUF1 = " + input_cell)
                    huruf = 'b'

                    document.getElementById("batt_qr").value = '';
                    document.getElementById("batt_qr").focus();
                    // document.getElementById("cell" + input_cell).style.backgroundColor = "green";
                } else if (huruf == 'b') {

                    input_cell = cell_value + huruf
                    cell_value = cell_value + 1;
                    console.log("HURUF2 = " + input_cell)
                    huruf = 'a'

                    document.getElementById("batt_qr").value = '';
                    document.getElementById("batt_qr").focus();
                    // document.getElementById("cell" + input_cell).style.backgroundColor = "red";
                } else {}

                console.log("nilaibin sama, lanjut proses = " + input_cell)

                document.getElementById("cell" + input_cell).style.backgroundColor = "green";
                // sern_before = nilai_cellSern;
                sern_before.push(nilai_cellSern);
                cetakData()

            } else {
                console.log("nilai bin berbeda, atau batterai serial sama harap cek = " + input_cell)
                console.log("nilai serial = " + nilai_cellSern)

                input_cell = cell_value + huruf
                console.log("INPUT CELL RED = " + input_cell)
                document.getElementById("cell" + input_cell).style.backgroundColor = "red";

                console.log("HURUF SAAT INI = " + huruf)
                if (scanCounter == 1) {
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    console.log("Bukan data AWAL, LANJUT")
                }

            }

        }

        function cetakData() {
            baris = baris + 1
            counter = baris;
            var html = "<tr id='baris" + baris + "'>"
            html += "<td>" + baris + "</td>"
            html += "<td class='cell_sern'>" + batt_qr_code + "</td>"
            // html += "<td class='frame_sn'>" + frame_qr_code + "</td>"
            html += "<td class='input_bin'>" + input_cell + "</td>"
            html += "<td class='input_cell'>" + input_cell + "</td>"

            $('#table1').append(html)

            if (counter == 30) {
                // autoSave();
                document.getElementById("frame_qr").focus();
                document.getElementById("frame_qr").value = '';
            }
        }

        //cek apakah frame sudah pernah di pakai
        function searchFrame(frame_qr_code) {
            $.ajax({
                type: "get",
                url: "{{ url('getFrameData') }}/" + frame_qr_code,
                // data: "name=" + name,
                success: function(frame_data) {
                    frameData = frame_data.frame_sn;
                    console.log("frameData = " + frameData);
                    if (frameData == undefined) {
                        // autoSave();
                        searchFrame2(frame_qr_code)

                    } else {
                        alert("Frames Already Exist");
                        document.getElementById("frame_qr").focus();
                        document.getElementById("frame_qr").value = '';
                    }
                },
                error: function(xhr, status, error) {}
            });
        }

        //cek apakah frame_qr adalah kode QR baterai
        function searchFrame2(frame_qr_code) {

            $.ajax({
                type: "get",
                url: "{{ url('getBattData') }}/" + frame_qr_code,
                // data: "name=" + name,
                success: function(frame_batt) {
                    frameData2 = frame_batt.cell_sern;
                    console.log("frameData2 = " + frameData2);
                    //jika frame scan bukan kode beterai, maka update data
                    if (frameData2 == undefined) {
                        if (counter == 32) {
                            // autoSave();
                            console.log("LANJUT UPDATE")
                        } else {
                            alert("The Battery Scan is Not Complete !!!");
                            document.getElementById("batt_qr").focus();
                            document.getElementById("batt_qr").value = '';
                        }

                    } else {
                        alert("Battery Serial Code Cannot be Used as Frame Serial Code : " +
                            frameData2);
                        document.getElementById("frame_qr").focus();
                        document.getElementById("frame_qr").value = '';
                    }

                },
                error: function(xhr, status, error) {}
            });
        }

        window.onload = function() {
            document.getElementById("batt_qr").focus();
        };
    </script>
@endsection
