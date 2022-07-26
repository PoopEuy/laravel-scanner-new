<?php

namespace App\Imports;

use App\Models\m_batts;
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

        return new m_batts([
           'capa_grad' => $row[0],
            'cell_sern' => $row[1],
            'crtn_sern' => $row[2],
            'm' => $row[3],
            'c_po' => $row[4],
            'v_po' => $row[5],
            'ir_po' => $row[6],
            'k' => $row[7],
            'w' => $row[8],
            'ha' => $row[9],
            'hc' => $row[10],
            't' => $row[11],
            'bin' => $bin


        ]);
    }
}
