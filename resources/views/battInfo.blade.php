@extends('layouts.main')

@section('container')
    <div id="frame1" style="min-height: 100% !important" >
        <div id="frame1_simbol">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <form id="searchForm"> <!-- Ensure your form tag covers all relevant elements -->
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1 class="display-1" style="text-align: center;">Battery Info</h1>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-6">
                        <label for="batt_type">Battery Type</label>
                        <select class="form-control" id="batt_type" name="batt_type" required>
                            <option>Select Battery Type</option>
                            @foreach ($data_mtype as $item)
                            <option value="{{ $item->type_batt }}">{{ $item->type_batt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="po">PO Type</label>
                        <select class="form-control" name="po" id="po" required>
                            <option>Select PO Type</option>
                        </select>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-primary" onclick="myFunction()">Search</button>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Battery Type</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_btype"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Total Battery</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_tbatt"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Framed Batt</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_framed"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Unframed Batt</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_notframed"></span></p>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">IR Max</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_irmax"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">IR Min</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_irmin"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">V Max</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_vmax"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">V Min</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_vmin"></span></p>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="col-md-12">
                        <h1 class="display-6" style="text-align: center;">Frame List</h1>
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Frame SN</th>
                                    <th>Bin</th>
                                    <th>Jumlah Baterai</th>
                                </tr>
                            </thead>
                            <tbody id="frameListBody">
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#batt_type').on('change', function() {
                let type_batt = $(this).val();

                $('#po').empty();
                $('#po').append('<option hidden>Select PO Type</option>');
                if (type_batt) {
                    $.ajax({
                        url: '/get_po_type',
                        type: "GET",
                        data: {
                            type_batt: type_batt,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res) {
                                $.each(res, function(key, data_po) {
                                    $('select[name="po"]').append('<option value="' + data_po.po + '">' + data_po.po + '</option>');
                                });
                            } else {
                                $('#po').empty();
                            }
                        }
                    });
                } else {
                    $('#po').empty();
                }
            });

            // Define myFunction outside of the document ready function scope
            window.myFunction = function() {
                const po_value = $("#po").val();
                const batt_type = $("#batt_type").val();

                $.ajax({
                    type: "post",
                    url: "{{ url('getBattByPo') }}",
                    data: {
                        po_value: po_value,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res);

                        // Display data in the existing sections
                        $("#val_btype").text(batt_type);
                        $("#val_tbatt").text(res.total_batt);
                        $("#val_framed").text(res.sudah_frame);
                        $("#val_notframed").text(res.belum_frame);
                        $("#val_irmax").text(res.ir_max);
                        $("#val_irmin").text(res.ir_min);
                        $("#val_vmax").text(res.v_max);
                        $("#val_vmin").text(res.v_min);

                        // Display frame list in table
                        let frameListBody = $("#frameListBody");
                        frameListBody.empty(); // Clear previous content

                        // Reconstructing rows with proper indexing
                        let rowsHtml = '';
                        $.each(res.frame_list, function(index, frame) {
                            rowsHtml += "<tr>" +
                                    "<td>" + (index + 1) + "</td>" +  // Row number
                                    "<td>" + frame.frame_sn + "</td>" +
                                    "<td>" + frame.bin + "</td>" +
                                    "<td>" + frame.jumlah_baterai + "</td>" +
                                    "</tr>";
                        });
                        frameListBody.html(rowsHtml);

                        // Reinitialize or redraw DataTable
                        if ($.fn.DataTable.isDataTable('#dataTable')) {
                            $('#dataTable').DataTable().clear().destroy();
                        }
                        $('#dataTable').DataTable({
                            "paging": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "responsive": true,
                            "data": res.frame_list, // Load new data into DataTable
                            "columns": [
                                { "data": null, "orderable": false }, // Row number column
                                { "data": "frame_sn" },
                                { "data": "bin" },
                                { "data": "jumlah_baterai" }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,
                                    "data": null,
                                    "defaultContent": "",
                                    "className": "dt-body-center",
                                    "render": function(data, type, row, meta) {
                                        // Render row index starting from 1
                                        return meta.row + 1;
                                    }
                                }
                            ]
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            };
        });

    </script>

@endsection
