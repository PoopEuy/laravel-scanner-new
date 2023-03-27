<?php

namespace App\Imports;

use App\Models\M_batt;
use Maatwebsite\Excel\Concerns\ToModel;

class mbattsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    
    protected $po_name;
    protected $batch;
    protected $bin_filter;

    function __construct($po_name, $batch, $bin_filter) {
        $this->po_name = $po_name;
        $this->batch = $batch;
        $this->bin_filter = $bin_filter;

        // echo $po_name;
        // echo '<br>';
        // echo $batch;
        // echo '<br>';
        // echo '<br>';
        // echo $bin_filter;
        // echo '<br>';
        // echo '<br>';

        $arr_bin=array();
        $arr_param=array();

        foreach ($bin_filter as $value) {
            
            $bin_val = $value->bin;            
            array_push($arr_bin,$bin_val);

            $param_val = $value->bin_param;            
            array_push($arr_param,$param_val);
            // echo ' array : <br>';
            // echo $arr_binrr_bin;
        }

        $this->arr_bin = $arr_bin;
        $this->arr_param = $arr_param;

    }

    public function model(array $row)
    {
        $bin_data = $row[4];
        $arr_bin = $this->arr_bin;
        $arr_param = $this->arr_param;

        $arr_bin_length = count($arr_bin);
        // print_r($bin_data);
        // echo '<br>';

        $cari_bin = true;
        for ($x = 0; $x <  $arr_bin_length && $cari_bin == true; $x++) {
         
                $nilai_bin = $arr_bin[$x]; 
                $nilai_param = $arr_param[$x]; 
            //  echo "The number is: $x, bin = $nilai_bin, param = $nilai_param <br>";
                if ($bin_data > $nilai_param) {
                    $bin = $nilai_bin;   
                    $cari_bin = false;
                }        
        }
        // echo "hasil bin adalah : $bin" ;
        // echo '<br>';

        $v_po = $row[5];
        $v_po = $v_po * 1000;
        $v_po = ceil($v_po);

        $ir_po = $row[6];
        $ir_po = $ir_po * 1000;
        $ir_po = ceil($ir_po);

        $k_value = $row[7];
        $k_value = $k_value * 730;

        $d_test = '';
        $cell = '';
        $frame_sn = '';
        
        return new M_batt([
           'capa_grad' => $row[0],
            'cell_sern' => $row[1],
            'crtn_sern' => $row[2],
            'm' => $row[3],
            'c_po' => $row[4],
            'v_po' => $v_po,
            'ir_po' => $ir_po,
            'k' => $k_value,
            'w' => $row[8],
            'ha' => $row[9],
            'hc' => $row[10],
            't' => $row[11],
            'bin' => $bin,
            'd_test' => $d_test,
            'cell' => $cell,
            'frame_sn' => $frame_sn,
            'po' => $this->po_name,
            'batch' => $this->batch


        ]);
    }
}