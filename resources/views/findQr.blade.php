@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="form-group col-md-6">
            <form action="/findQrCode" method="post">
                @method('post')
                @csrf
                <div class="form-group col-md-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputEmail4">Scan QR COde</label>
                            <input type="text" class="form-control" id="scan_qr" name="scan_qr"
                                placeholder="Scan QR COde Here" value="">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </form>
        </div>
    </div>
@endsection
