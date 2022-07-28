@extends('layouts.main')
{{-- @dd($data_batt) --}}
@section('container')
    {{-- {{ $scan }} --}}

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('/m_battsexport') }}" class="btn btn-success">Export</a>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cell Serial</th>
                            <th>Carton Serial</th>
                            <th>OCVB</th>
                            <th>IMPB</th>
                            <th>BIN</th>
                            <th>V_gr</th>
                            <th>IR_gr</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data_batt as $index => $item)
                            <tr>
                                <td>
                                    {{ $data_batt->firstItem() + $index }}
                                </td>
                                <td>
                                    {{ $item->cell_sern }}
                                </td>
                                <td>
                                    {{ $item->crtn_sern }}
                                </td>
                                <td>
                                    {{ $item->ir_po }}
                                </td>
                                <td>
                                    {{ $item->v_po }}
                                </td>
                                <td>
                                    {{ $item->bin }}
                                </td>
                                <td>
                                    {{ $item->v_gr }}
                                </td>
                                <td>
                                    {{ $item->ir_gr }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                {{ $data_batt->links() }}

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
                        <form action="{{ url('m_battimportexcel/') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="file" name="file" required="required">

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
@endsection
