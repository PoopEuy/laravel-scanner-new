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
    function __construct($po_name, $batch) {
        $this->po_name = $po_name;
        $this->batch = $batch;
    }


    public function model(array $row)
    {
        // $bin_data = $row[4];
        //batteraihitium type PO 3003
        // if($bin_data >= 299.001){
        // $bin = 1;
        // }else if($bin_data >= 298.001){
        // $bin = 2;
        // }else if($bin_data >= 297.001){
        // $bin = 3;
        // }
        
        //batterai type foxes 2896 PO 280Ah
        // if($bin_data >= 298.001){
        // $bin = 1;
        // }else if($bin_data >= 296.001){
        // $bin = 2;
        // }else if($bin_data >= 294.001){
        // $bin = 3;
        // }
        // else if($bin_data >= 292.001){
        // $bin = 4;
        // }
        // else if($bin_data >= 290.001){
        // $bin = 5;
        // }
        // else if($bin_data >= 288.001){
        // $bin = 6;
        // }
        // else if($bin_data >= 286.001){
        // $bin = 7;
        // }
        // else if($bin_data >= 284.001){
        // $bin = 8;
        // }
        // else if($bin_data >= 282.001){
        // $bin = 9;
        // }
        // else if($bin_data >= 280.001){
        // $bin = 10;
        // }

        //batterai type foxes 2896 PO 70Ah
        // if($bin_data >= 72.001){
        // $bin = 1;
        // }else if($bin_data >= 71.001){
        // $bin = 2;
        // }else if($bin_data >= 70.001){
        // $bin = 3;
        // }

        //batterai type foxes 2896 PO 50Ah
        // if($bin_data >= 54.001){
        // $bin = 1;
        // }else if($bin_data >= 53.001){
        // $bin = 2;
        // }else if($bin_data >= 52.001){
        // $bin = 3;
        // }else if($bin_data >= 51.001){
        // $bin = 4;
        // }else if($bin_data >= 50.001){
        // $bin = 5;
        // }

        //EVE LF100LA
        $bin_data = $row[12];
        $bin = $bin_data;
        // if($bin_data >=  110.01){
        // $bin = 0;
        // }else if($bin_data >=  109.85){
        // $bin = 1;
        // }else if($bin_data >=  109.71){
        // $bin = 2;
        // }else if($bin_data >=  109.56){
        // $bin = 3;
        // }else if($bin_data >=  109.42){
        // $bin = 4;
        // }else if($bin_data >=  109.27){
        // $bin = 5;
        // }else if($bin_data >=  109.13){
        // $bin = 6;
        // }else if($bin_data >=  108.99){
        // $bin = 7;
        // }else if($bin_data >= 108.84){
        // $bin = 8;
        // }else if($bin_data >= 108.70){
        // $bin = 9;
        // }else if($bin_data >= 108.55){
        // $bin = 10;
        // }else if($bin_data >= 108.41){
        // $bin = 11;
        // }else if($bin_data >= 108.26){
        // $bin = 12;
        // }else if($bin_data >= 108.12){
        // $bin = 13;
        // }else if($bin_data >= 107.97){
        // $bin = 14;
        // }else if($bin_data >= 107.83){
        // $bin = 15;
        // }else if($bin_data >= 107.68){
        // $bin = 16;
        // }

        $v_po = $row[5];
         //pembulatan baterai EVE
        $v_po = round($v_po, 2);
        $v_po = $v_po * 1000;
        //pembulatan baterai foxes & hitium
        // $v_po = ceil($v_po);
       
        $ir_po = $row[6];
        //pembulatan baterai EVE
        $ir_po = round($ir_po, 2);
        $ir_po = $ir_po * 1000;
        //pembulatan baterai foxes & hitium
        // $ir_po = ceil($ir_po);

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