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
    public function model(array $row)
    {
        $bin_data = $row[4];
        if($bin_data >= 299.001){
        $bin = 1;
        }else if($bin_data >= 298.001){
        $bin = 2;
        }else if($bin_data >= 297.001){
        $bin = 3;
        }

        $v_po = $row[5];
        $v_po = $v_po * 1000;
        $v_po = ceil($v_po);

        $ir_po = $row[6];
        $ir_po = $ir_po * 1000;
        $ir_po = ceil($ir_po);

        $k_value = $row[7];
        $k_value = $k_value * 730;

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
            'bin' => $bin


        ]);
    }
}