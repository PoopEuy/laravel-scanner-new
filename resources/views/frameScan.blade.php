@extends('layouts.main')

@section('container')
    {{-- {{ $scan }} --}}
    {{-- @dd($voltage) --}}
    <div id="frame1">
        <div class="row" id="noData" style="display: block">
            <div class="form-group col-md-12">
                <h1 class="display-1" style="text-align: center;">Frame Model</h1>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <div class="kotak-kotak">
                    <div class="ssb-icon">
                        <i id="c4_smbl" class="fa fa-caret-left" style="font-size:48px;color:black"> C4 </i>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="kotak-kotak">
                    <div class="ssb-icon">
                        <i id="c3_smbl" class="fa fa-caret-left" style="font-size:48px;color:black"> C3 </i>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="kotak-kotak">
                    <div class="ssb-icon">
                        <i id="c2_smbl" class="fa fa-caret-left" style="font-size:48px;color:black"> C2 </i>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="kotak-kotak">
                    <div class="ssb-icon">
                        <i id="c1_smbl" class="fa fa-caret-left" style="font-size:48px;color:black"> C1 </i>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <div class="form-group col-md-3">
                <div class="kotak-kotak">
                    <div class="ssb-icon">
                        <i id="c5_smbl" class="fa fa-caret-right" style="font-size:48px;color:black"> C5 </i>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row" id="noData" style="display: block">
            <div class="form-group col-md-12">
                <h1 class="display-1" style="text-align: center;">Tidak Ada Data Terbaru</h1>
            </div>
        </div> --}}

        <button type="submit" id="submit" class="btn btn-primary">Search</button>
    </div>

    <script src="js/frameScan.js"></script>
@endsection
