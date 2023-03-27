@extends('layouts.main')

@section('container')
    <div id="frame1">
        <div class="row">
            
            <!-- <form onsubmit="return validateForm()" name="modalForm" action="{{ url('m_battimportexcel/') }}" method="post" enctype="multipart/form-data"> -->
                <form name="modalForm" action="{{ url('m_battimportexcel/') }}" method="post" enctype="multipart/form-data">  
                    @method('post')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <h1 class="display-1" style="text-align: center;">Import Data</h1>
                        </div>
                    </div>

                    <div class="row row-margin-top-30">
                        <div class="form-group col-md-6">
                            <div class="form-row row-margin-top">
                                <div class="form-group">
                                    <label for="batt_type">Batt Type</label>
                                    <!-- <select class="form-control" name="product_id"> -->
                                    <!-- <option>Select Item</option> -->
                                    <select class="form-control" id="batt_type" name="batt_type" required="required">
                                        <option>Select Batt Type</option>
                                    @foreach ($data_mtype as $index => $item)
                                        <option value="{{ $item->type_batt }}" required="required">{{ $item->type_batt }}</option>

                                        
                                    @endforeach
                                    </select>
                                </div>

                                
                            </div>

                            <div class="form-row row-margin-top">
                                <div class="form-group">
                                    <label for="po_name">PO Type</label>
                                    <select class="form-control" name="po_name" id="po_name" required="required">
                                    <option>Select PO Type</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row row-margin-top">
                                <div class="form-group">
                                    <label for="batch">Batch</label>
                                    <input type="number" class="form-control" id="batch" name="batch" placeholder="Batch"
                                    value="" required="required">
                                </div>
                            </div>

                            <div class="form-row row-margin-top">
                                <div class="form-group">
                                        <label>Select File : </label>
                                        <br>
                                        <input type="file" id="myfile" name="file" required="required">
                                </div>
                            </div>
                            <br>
                            <div class="form-row row-margin-top">
                            <button  id="buttonImport" type="submit" class="btn btn-primary">Import Data</button>
                            </div>
                        
                        </div>
                    </div>
                </form>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            //onchange select batttype
            let bin_array = []
            let data_respon;
            let po_name;
            let batch;
            

            $('#batt_type').on('change', function() {
                var type_batt = $(this).val();

                $('#po_name').empty();
                $('#po_name').append('<option hidden>Select PO Type</option>'); 
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
                                $('select[name="po_name"]').append('<option value="'+ data_po.po +'">' + data_po.po+ '</option>');
                                console.log(" data_po : " +data_po)
                                console.log(" po : " +data_po.po)
                                console.log(" type_batt : " +data_po.type_batt)
                            });
                            
                        }else{
                            $('#po_name').empty();
                        }
                     }
                   });
               }else{
                 $('#course').empty();
               }
            });

            //onchange select potype
            $('#po_name').on('change', function() {
                var po_name = $(this).val();
                
                
                if(po_name) {
                    console.log(" po_name : " +po_name );
                   $.ajax({
                       url: '/getBinByPo',
                       type: "GET",
                       data : {po_name: po_name,
                                "_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(res)
                       {
                         if(res){
                            console.log("res : " + res)
                            data_respon = res;
                            console.log("datares : " + res)
                            // document.getElementById("data_res").value = data_respon;
                            // $.each(res, function(key, bin_data){
                                
                            //     console.log(" po_name : " + bin_data.po + " bin : " + bin_data.bin + " bin Params : " + bin_data.bin_param )
                                
                                
                            // });
                            
                        }else{
                          
                        }
                     }
                   });
               }else{
                 $('#course').empty();
               }
            });

            //ONcLICK
            // $(document).on('click', '#buttonImport', function() {
            //     console.log("saveData");
            //     validateForm();
            // })

            function validateForm() {
            po_name = document.getElementById("po_name").value;
            batch = document.getElementById("batch").value;

            // po_name = document.forms["modalForm"]["po_name"].value;
            // batch = document.forms["modalForm"]["batch"].value;
            if (po_name == "" || po_name == null || batch == "" || batch == null) {
            alert("PO Name &  Batch must be filled out");
            return false;
                }else{
                    importData()
                }         
            }    
            
            function importData() {
                console.log('importData : '+ data_respon);
                console.log('po_name : '+ po_name);
                console.log('batch : '+ batch);
                // data_po = data_respon.po;
                // console.log('data_po : '+ data_po);
                var myFile = document.getElementById("myfile").value;
                console.log("filename : " + myFile);
                console.log("filename : " + myFile);
                $.ajax({
                    url: '/m_battimportexcel',
                    type: "post",
                    data: {
                        po_name: po_name, 
                        batch: batch,
                        myFile: myFile,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log("data_res = " + res);
                       

                    },
                    error: function(xhr, status, error) {
                        console.log("error : " + xhr);
                       
                    }
                });
            }
            
        });
    </script>
@endsection
