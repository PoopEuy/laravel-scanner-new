@extends('layouts.main')

@section('container')
    <div id="frame1">
        <div id="frame1_simbol">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1 class="display-1" style="text-align: center;">Battery Info</h1>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <!-- <div class="form-group col-md-6">
                        <label for="inputEmail4">PO Name</label>
                        <input type="text" class="form-control rounded-top @error('po') is-invalid @enderror" id="po" name="po" placeholder="PO Name" value="{{ old('po') }}" required>
                        @error('po')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                
                    <div class="row row-margin-top">
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="batt_type">Battery Type</label>
                                    <select class="form-control" id="batt_type" name="batt_type" required="required">
                                        <option>Select Battery Type</option>
                                    @foreach ($data_mtype as $index => $item)
                                        <option value="{{ $item->type_batt }}" required="required">{{ $item->type_batt }}</option>

                                        
                                    @endforeach
                                    </select>
                                </div>
                        </div>       
                    </div>

                    <div class="row row-margin-top">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                    <label for="po">PO Type</label>
                                    <select class="form-control" name="po" id="po" required="required">
                                    <option>Select PO Type</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="row row-margin-top-30">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary" onclick="myFunction()">Search</button>
                    </div>    
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Battery Type</h1>
                        <p class="display-6 page-font-size-c30" ><span id="val_btype"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Total Battery</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_tbatt"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Framed</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_framed"></span></p>
                    </div>
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">Unframed</h1>
                        <p class="display-6 page-font-size-c30"><span id="val_notframed"></span></p>
                    </div>
                </div>

                <div class="row row-margin-top-30">
                    <div class="form-group col-md-3">
                        <h1 class="display-6" style="text-align: center;">IR Max</h1>
                        <p class="display-6 page-font-size-c30" ><span id="val_irmax"></span></p>
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

                
            
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#batt_type').on('change', function() {
                var type_batt = $(this).val();

                $('#po').empty();
                $('#po').append('<option hidden>Select PO Type</option>'); 
                if(type_batt) {
                    console.log(" type_batt : " +type_batt );
                   $.ajax({
                       url: '/get_po_type',
                       type: "GET",
                       data : {type_batt: type_batt,
                                "_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(res)
                       {
                         if(res){
                            
                            $.each(res, function(key, data_po){
                                $('select[name="po"]').append('<option value="'+ data_po.po +'">' + data_po.po+ '</option>');
                                console.log(" data_po : " +data_po)
                                console.log(" po : " +data_po.po)
                                console.log(" type_batt : " +data_po.type_batt)
                            });
                            
                        }else{
                            $('#po').empty();
                        }
                     }
                   });
               }else{
                 $('#course').empty();
               }
            });

            
        }); 
        
        function myFunction()
        {
                
                const po_value = document.getElementById("po").value;
                const batt_type = document.getElementById("batt_type").value;
                console.log("po_value : " + po_value);

                $.ajax({
                    type: "post",
                    url: "{{ url('getBattByPo') }}",
                    data: {
                        po_value: po_value,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res);
                        console.log(res.total_batt);

                        document.getElementById("val_btype").textContent = batt_type;
                        document.getElementById("val_tbatt").textContent = res.total_batt;
                        document.getElementById("val_framed").textContent = res.sudah_frame;
                        document.getElementById("val_notframed").textContent = res.belum_frame;

                        document.getElementById("val_irmax").textContent = res.ir_max;
                        document.getElementById("val_irmin").textContent = res.ir_min;
                        document.getElementById("val_vmax").textContent = res.v_max;
                        document.getElementById("val_vmin").textContent = res.v_min;
                        
                        // fstatus = res;
                        // frameStatus(fstatus);

                    },
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        // fstatus = xhr;
                        // frameStatus(fstatus);
                    }
                });
        };
    </script>
@endsection
