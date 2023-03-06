@extends('layouts.main')
{{-- @dd($data_batt) --}}
@section('container')
    {{-- {{ $scan }} --}}

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('/m_battsexport') }}" class="btn btn-success">Export</a>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
                <form action="/batt_show" method="GET">
                    <div class="row col col-lg-12">
                        <div class="search-batt row col col-lg-4 align-items-center">

                            <div class="col-sm-4">
                                <label class="col-form-label">Serial Number</label>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" name="keyword1" id="keyword1" class="form-control"
                                    aria-describedby="search-cell-serial">

                            </div>
                        </div>

                        <div class="search-batt row col col-lg-2 align-items-center">

                            <div class="col-sm-2">
                                <label class="col-form-label">BIN</label>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" name="keyword2" id="keyword2" class="form-control"
                                    aria-describedby="search-cell-serial">

                            </div>


                        </div>

                        <div class="search-batt row col col-lg-4 align-items-center">

                            <div class="col-sm-2">
                                <label class="col-form-label">Frame Code</label>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" name="keyword3" id="keyword3" class="form-control"
                                    aria-describedby="search-cell-serial">

                            </div>


                        </div>
                        <div class="search-batt row col col-lg-2 align-items-center">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <div class="card-body">
                @include('partials.table_batt_value')



            </div>

            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form onsubmit="return validateForm()" name="modalForm" action="{{ url('m_battimportexcel/') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Select File : </label>
                                        <br>
                                        <input type="file" name="file" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>PO Name</label>
                                        <br>
                                        <input type="text" name="po_name" >
                                    </div>

                                    <div class="form-group">
                                        <label>Batch</label>
                                        <br>
                                        <input type="text" name="batch" >
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById("keyword1").focus();
        };

        function validateForm() {
            var po_name = document.forms["modalForm"]["po_name"].value;
            var batch = document.forms["modalForm"]["batch"].value;
            if (po_name == "" || po_name == null || batch == "" || batch == null) {
            alert("PO Name &  Batch must be filled out");
            return false;
            }
        }

    </script>
@endsection
