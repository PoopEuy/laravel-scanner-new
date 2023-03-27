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
            <form  action="/createMbin" method="post" enctype="multipart/form-data" method="POST">
                
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1 class="display-1" style="text-align: center;">Bin Setting</h1>
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
                                    <label for="batt_type">Batt Type</label>
                                    <select class="form-control" id="batt_type" name="batt_type" required="required">
                                        <option>Select Batt Type</option>
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

                    <div class="row row-margin-top">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">BIN</label>
                            <input type="text" class="form-control rounded-top @error('bin') is-invalid @enderror" id="bin" name="bin" placeholder="Bin" value="{{ old('bin') }}" required>
                            @error('bin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row row-margin-top">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">BIN Param</label>
                            <input type="text" class="form-control rounded-top @error('bin_param') is-invalid @enderror" id="bin_param" name="bin_param" placeholder="BIN Param" value="{{ old('bin_param') }}" required>
                            @error('bin_param')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
     
                </div>

                
                <div class="row row-margin-top-30">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>    
                </div>
            </form>
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
        
    </script>
@endsection
