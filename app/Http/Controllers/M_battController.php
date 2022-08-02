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
        $data_batt = M_batt::orderBy('updated_at', 'DESC')->paginate(15);
        // dd($data_batt);
        return view('tabel_batt',["title" => "DataBatt", "data_batt" => $data_batt]);
    }

    public function scan_now($cell_sern_scan, $v_gr_scan, $ir_gr_scan){
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

    public function scanIrVolt($v_gr_scan, $ir_gr_scan){
        return view('scanIrVolt',
            [
                "title" => "scanIrVolt",
                "v_gr_scan" => $v_gr_scan,
                "ir_gr_scan" => $ir_gr_scan

            ]);

    }

    public function vendorVoltIr(Request $request){

        $cell_sern_scan = $request->input('cell_sern_scan');
        $v_gr_scan = $request->input('v_gr_scan');
        $ir_gr_scan = $request->input('ir_gr_scan');
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

    public function update(Request $request,$cell_sern_scan){
        $batt_data = M_batt::where('cell_sern', $cell_sern_scan)->first();
        $batt_data->v_gr = $request->input('v_gr_scan');
        $batt_data->ir_gr = $request->input('ir_gr_scan');
        $data_input_v_gr = $request->input('v_gr_scan');
        $data_input_ir_gr = $request->input('ir_gr_scan');

        $batt_data->update();
        return redirect('scan/'.$cell_sern_scan.'/'.$data_input_v_gr.'/'.$data_input_ir_gr)->with('success', 'Data Updated Succesfully');
        // echo $cell_sern_scan;
    }

    public function searchBinPage(){
        return view('searchBinPage',
            [
                "title" => "Find BINQR"


            ]);

    }

    public function searchBinData(Request $request, $cell_sern_scan){

        $bin_data = M_batt::where('cell_sern', $cell_sern_scan)->first();
        return view('searchBinData')->with([
            'data'=>$bin_data
        ]);

    }

    public function m_battexport(){
        return Excel::download(new mbattsExport, 'm_batss.xlsx');

    }

    public function voltageUpdate(){
        $voltageUpdate = M_batt::orderBy('updated_at', 'DESC')->first();
        // dd($data_batt);
        return view('voltageUpdate',["title" => "V&IR Update", "voltage" => $voltageUpdate]);
    }

    public function m_battimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataExcel', $namaFile);

        Excel::import(new mbattsImport, public_path('/DataExcel/'.$namaFile));
        return redirect('/batt_show');

    }
}