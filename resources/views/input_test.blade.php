@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="form-group col-md-6">
            <form action="{{ url('/input_test') }}" method="POST" onkeydown="return event.key != 'Enter';">
                <div class="form-group col-md-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputEmail4">Vendor Cell Series Number</label>
                            <input type="text" class="form-control" id="db_cell_sern"
                                placeholder="Vendor Cell Series Number" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Vendor OCVB (V)</label>
                            <input type="text" class="form-control" id="db_v_po" placeholder="Vendor OCVB (V)"
                                value="">
                        </div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection
