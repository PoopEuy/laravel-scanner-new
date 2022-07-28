<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_batt;
use App\Exports\mbattsExport;
use App\Imports\mbattsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class M_battController extends Controller
{
   public function batt_show(){
        $data_batt = M_batt::paginate(15);
        // dd($data_batt);
        return view('tabel_batt',["title" => "Posts", "data_batt" => $data_batt]);
    }

    public function scan_now($cell_sern_scan, $v_gr_scan, $ir_gr_scan){
        // $tes_data = M_batt::all();
        // $scan_data = M_batt::where('cell_sern', $cell_sern_scan)->get();
        // echo $scan_data;
        $scan = M_batt::where('cell_sern', $cell_sern_scan)->first();

        if (!empty($scan)) {
            return view('scan',
            [
                "title" => "Scan",
                "cell_sern_scan" => $cell_sern_scan,
                "v_gr_scan" => $v_gr_scan,
                "ir_gr_scan" => $ir_gr_scan,
                "scan" => $scan
            ]);
        }else{

            return view('/empty_qrcode',["title" => "EmptyQRCode"]);
        }

    }

    public function findQrCode(Request $request){

        $scan_qr = $request->input('scan_qr');
        // echo $scan_qr;
        $scan = M_batt::where('cell_sern', $scan_qr)->first();
        if (!empty($scan)) {
            return view('dataBin',
            [
                "title" => "Scan",
                "scan" => $scan
            ]);
        }else{

            return view('/empty_qrcode',["title" => "EmptyQRCode"]);
        }

    }

    public function update(Request $request,$cell_sern_scan){
        $batt_data = M_batt::where('cell_sern', $cell_sern_scan)->first();
        $batt_data->v_gr = $request->input('v_gr_scan');
        $batt_data->ir_gr = $request->input('ir_gr_scan');
        $data_input_v_gr = $request->input('v_gr_scan');
        $data_input_ir_gr = $request->input('v_gr_scan');

        $batt_data->update();
        return redirect('scan/'.$cell_sern_scan.'/'.$data_input_v_gr.'/'.$data_input_ir_gr)->with('success', 'Data Updated Succesfully');
        // echo $cell_sern_scan;
    }

    public function M_battexport(){
        return Excel::download(new mbattsExport, 'm_batss.xlsx');

    }

    public function m_battimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataExcel', $namaFile);

        Excel::import(new mbattsImport, public_path('/DataExcel/'.$namaFile));
        return redirect('/batt_show');

    }
}