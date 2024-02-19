@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($voltage) --}}
    <div id="frame1">
        <div id="frame1_simbol">
            <div class="row" style="display: block">
                <div class="form-group col-md-12">
                    <h1 class="display-1" style="text-align: center;">Frame Model</h1>
                    <h5 class="display-6" style="text-align: center;">Talis 7</h5>
                </div>
            </div>

            <div class="row binFrame" style="margin-top: 30px;">
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">First BIN = <strong id="firstBin"></strong> </h1>
                </div>
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">Current BIN = <strong id="currBin"></strong> </h1>
                </div>
            </div>

            <div class="row statusBatt">
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">Status V Test = <strong id="vstatus"></strong> </h1>
                    {{-- <h2 id="vstatus" class="display-1" style="text-align: left; font-size:3rem;">
                        {{ $voltage->v_status }}</h2> --}}
                </div>
                <div class="form-group col-md-6">
                    <h1 class="display-6" style="text-align: left;">Status IR Test = <strong id="irstatus"></strong> </h1>
                    {{-- <h2 id="irstatus" class="display-1" style="text-align: left; font-size:3rem;">
                        {{ $voltage->ir_status }}</h2> --}}
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

            {{-- <div class="row">
                <div class="form-group col-md-3">
                    <div class="kotak-kotak">
                        <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                            <i id="cell4" class="fa fa-caret-left" style="font-size:30px;color:white"> C4 </i>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="kotak-kotak">
                        <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                            <i id="cell3" class="fa fa-caret-left" style="font-size:30px;color:white"> C3 </i>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="kotak-kotak">
                        <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                            <i id="cell2" class="fa fa-caret-left" style="font-size:30px;color:white"> C2 </i>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="kotak-kotak">
                        <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                            <i id="cell1" class="fa fa-caret-left" style="font-size:30px;color:white"> C1 </i>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center" id="cellContent">
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                        <div class="kotak-kotak">
                            <div class="ssb-icon" id={{ "cellKosong " }} style="background-color: black" id={{ "plate " }} 
                            style="background-color: black">
                                <span style="font-size:30px;color:white;"><i class=""></i>
                                        {{ "Plate" }} </span>
                            </div>
                        </div>
                    </div>
                    @for ($i = 1; $i < 3; $i++)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black"
                                    id={{ "cell$i " }} style="background-color: black">
                                    <span style="font-size:30px;color:white;"><i class="fa fa-caret-right"></i>
                                        {{ "C$i " }} </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                
                <div class="row justify-content-center">
                    @for ($i = 5; $i > 2; $i--)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-left"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row justify-content-center">
                    @for ($i = 6; $i < 9; $i++)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-right"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row justify-content-center">
                    @for ($i = 11; $i > 8; $i--)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-left"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row justify-content-center">
                    @for ($i = 12; $i < 15; $i++)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-right"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row justify-content-center">
                    @for ($i = 17; $i > 14; $i--)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-left"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="row justify-content-center">
                    @for ($i = 18; $i < 21; $i++)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-right"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                 <div class="row justify-content-center">
                    @for ($i = 23; $i > 20; $i--)
                        <div class="form-group col-md-3">
                            <div class="kotak-kotak">
                                <div class="ssb-icon" id={{ "cell$i " }} style="background-color: black">
                                    <span id={{ "cell$i " }} style="font-size:30px;color:white">
                                        {{ "C$i " }} <i class="fa fa-caret-left"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                
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
                                    <th>mV status</th>
                                    <th>IR status</th>
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
        $(document).ready(function() {
            var frame_qr_code;
            var batt_qr_code;
            var nilai_bin;
            var nilai_firstBin;
            var nilai_cellSern;
            var nilai_cell;
            var sern_before = new Array();

            let delta_mv;
            let delta_ir;
            let mv_status;
            let ir_status;
            let final_status;
            let baris = 0
            let scanCounter = 0
            let counter;

            $(document).on('click', '#tambah_data', function() {
                console.log("button terklik");
                console.log("frame qr = " + frame_qr_code)

                baris = baris + 1;
                var html = "<tr id='baris" + baris + "'>"
                html += "<td>" + baris + "</td>"
                html += "<td class='cell_sern'></td>"
                html += "<td class='frame_sn'>" + frame_qr_code + "</td>"
                html += "<td class='bin'></td>"
                // html += "<td ><button class='btn btn-danger' data-row='baris" + baris +
                //     "' id='hapus'></button></td>"

                $('#table1').append(html)
            })

            $(document).on('click', '#hapus', function() {

                let hapus = $(this).data('row')
                console.log("button hapus = " + hapus);
                $('#' + hapus).remove()

            })

            $("#batt_qr").keyup(function(event) {
                if (event.keyCode === 13) {
                    $("#cari_batt").click();
                }
            });

            $('body').on('click', '#cari_batt', function() {

                batt_qr_code = document.getElementById("batt_qr").value;
                console.log("batt qr = " + batt_qr_code)
                searchBatt(batt_qr_code);

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

            //cek apakah frame_qr adalah kode QR baterai, jika bukan maka lolos
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
                            if (counter == 23) {
                                autoSave();
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

            function autoSave() {
                $("#save_frame").click();
            }

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
                            delta_mv = frame_batt.delta_mv;
                            delta_ir = frame_batt.delta_ir;

                            mv_status = frame_batt.v_status;
                            ir_status = frame_batt.ir_status;

                            document.getElementById("currBin").textContent = nilai_bin;

                            if (scanCounter == 1) {
                                console.log("scan Counter 1")
                                nilai_firstBin = frame_batt.bin;
                                document.getElementById("firstBin").textContent = nilai_firstBin;

                                statusCheck()
                            } else {
                                console.log("scan Counter bukan1")
                                statusCheck()
                            }

                            // binCheck();
                        } else {
                            alert("Data Not Found, Please Check Again !!");
                            document.getElementById("batt_qr").focus();
                            document.getElementById("batt_qr").value = '';
                        }

                    },
                    error: function(xhr, status, error) {}
                });
            }

            function statusCheck() {
                //jika status pass/faill perlu di hitung kembali menggunakan rumus ini
                // if (delta_mv > 17) {
                //     mv_status = 'Fail'
                // } else if (delta_mv >= 13.0) {
                //     mv_status = 'Pass'
                // } else {
                //     mv_status = 'Fail'
                // }

                // if (delta_ir > 262.5) {
                //     ir_status = 'Fail'
                // } else if (delta_ir >= 175.0) {
                //     ir_status = 'Pass'
                // } else {
                //     ir_status = 'Fail'
                // }

                if (mv_status == 'Pass' && ir_status == 'Pass') {
                    final_status = "Pass"
                } else {
                    final_status = "Fail"
                }

                binCheck()
            }

            function binCheck() {
                document.getElementById("vstatus").textContent = mv_status;
                document.getElementById("irstatus").textContent = ir_status;
                const isInArray = sern_before.includes(nilai_cellSern);

                document.getElementById("batt_qr").value = '';
                document.getElementById("batt_qr").focus();

                console.log("BEFORE SERN = " + sern_before)
                console.log("BEFORE isInArray = " + isInArray)
                console.log("Cek Cell = " + nilai_cell)
                console.log("Nilai Bin = " + nilai_bin)
                console.log("Delta Mv = " + mv_status + " " + delta_mv)
                console.log("Delta IR = " + ir_status + " " + delta_ir)
                console.log("FINAL STATUS = " + final_status)

                if (nilai_firstBin == nilai_bin && isInArray == false && nilai_cell == '' && nilai_bin !=
                    undefined && final_status == 'Pass') {
                    console.log("nilaibin sama, lanjut proses = " + baris)
                    toogleWarna = baris + 1;
                    document.getElementById("cell" + toogleWarna).style.backgroundColor = "green";
                    sern_before.push(nilai_cellSern);

                    cetakData();
                } else {
                    console.log("nilai bin berbeda, atau batterai serial sama harap cek = " + baris)
                    console.log("nilai serial = " + nilai_cellSern)
                    toogleWarna = baris + 1;
                    document.getElementById("cell" + toogleWarna).style.backgroundColor = "red";
                    if (scanCounter == 1) {
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 500);
                    } else {
                        console.log("LANJUT")
                    }

                }

            }

            function cetakData() {
                console.log("nilai BIN = " + nilai_bin)
                baris = baris + 1;
                cell = baris;
                counter = baris;
                var html = "<tr id='cell" + baris + "'>"
                html += "<td>" + baris + "</td>"
                html += "<td class='input_cell_sern'>" + nilai_cellSern + "</td>"
                // html += "<td class='input_frame_sn'>" + frame_qr_code + "</td>"
                html += "<td class='input_bin_input'>" + nilai_bin + "</td>"
                html += "<td class='input_cell_input'>" + cell + "</td>"
                html += "<td class='input_mv_status'>" + mv_status + "</td>"
                html += "<td class='input_ir_status'>" + ir_status + "</td>"
                // html += "<td ><button class='btn btn-danger' data-row='baris" + baris +
                //     "' id='hapus'></button></td>"

                $('#table1').append(html)

                if (counter == 23) {
                    // autoSave();
                    document.getElementById("frame_qr").focus();
                    document.getElementById("frame_qr").value = '';
                }
            }

            $('body').on('click', '#save_frame', function() {
                console.log("Save Frame")
                let input_cell_sern = []
                // let input_frame_sn = []
                let input_bin_input = []
                let input_cell_input = []
                let input_mv_status = []
                let input_ir_status = []

                $('.input_cell_sern').each(function() {
                    input_cell_sern.push($(this).text())
                })

                // $('.input_frame_sn').each(function() {
                //     input_frame_sn.push($(this).text())
                // })

                $('.input_bin_input').each(function() {
                    input_bin_input.push($(this).text())
                })

                $('.input_cell_input').each(function() {
                    input_cell_input.push($(this).text())
                })

                $('.input_mv_status').each(function() {
                    input_mv_status.push($(this).text())
                })

                $('.input_ir_status').each(function() {
                    input_ir_status.push($(this).text())
                })

                $.ajax({
                    type: "post",
                    // url: "{{ url('saveFrameData') }}",
                    url: "{{ url('saveFrameData') }}/" + counter,
                    data: {
                        cell_sern: input_cell_sern,
                        frame_sn: frame_qr_code,
                        bin: input_bin_input,
                        cell: input_cell_input,
                        v_status: input_mv_status,
                        ir_status: input_ir_status,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res)
                        fstatus = res;
                        frameStatus(fstatus);

                    },
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        fstatus = xhr;
                        frameStatus(fstatus);
                    }
                });
            })

            function frameStatus(fStatus) {
                console.log("UPDATE SUkses" + fStatus)
                if (fStatus == 'success') {
                    frame_status.style.display = "block";
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    frame_status.style.display = "none";
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            }

            window.onload = function() {
                document.getElementById("batt_qr").focus();
            };



        })
    </script>
@endsection
