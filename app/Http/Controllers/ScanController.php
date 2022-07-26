<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_batts;

class scanController extends Controller
{


    public function scan_now($cell_sern_scan, $c_po_scan){
        // $tes_data = M_batt::all();
        // $scan_data = M_batt::where('cell_sern', $cell_sern_scan)->get();
        // echo $scan_data;

        return view('scan',
    [
        "title" => "Scan",
        "cell_sern_scan" => $cell_sern_scan,
        "c_po_scan" => $c_po_scan,
        "scan" => M_batts::where('cell_sern', $cell_sern_scan)->first()
    ]);
    }

    public function update(Request $request,$cell_sern_scan){
        $batt_data = M_batts::where('cell_sern', $cell_sern_scan)->first();
        $batt_data->v_gr = $request->input('c_po_scan');
        $data_input = $request->input('c_po_scan');

        $batt_data->update();
        // echo $cell_sern_scan;
    }


}
