<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_batt;
use App\Models\M_bin;
use Illuminate\Support\Facades\DB;
use App\Exports\mbattsExport;
use App\Imports\mbattsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Helper\Sample;

class M_battController extends Controller
{
    public function batt_show(Request $request){

        $keyword1 = $request->keyword1;
        $keyword2 = $request->keyword2;
        $keyword3 = $request->keyword3;

        if ($keyword1 != '') {
            // echo 'keyword1 tidak kosong';
            $data_batt = M_batt::where('cell_sern', 'LIKE', '%' .$keyword1.'%')->latest('d_test')->distinct()->paginate(20);
        } elseif($keyword2 != '') {
            // echo 'keyword2 tidak kosong';
            $data_batt = M_batt::where('bin', 'LIKE', '%' .$keyword2.'%')->latest('d_test')->distinct()->paginate(20);

        } elseif($keyword3 != '') {
            // echo 'keyword2 tidak kosong';
            $data_batt = M_batt::where('frame_sn', 'LIKE', '%' .$keyword3.'%')->latest('d_test')->distinct()->paginate(20);

        }
        else{
            $data_batt = DB::table('m_batts')->latest('d_test')->distinct()->paginate(20);
        }


        // $data_batt = M_batt::orderBy('updated_at', 'DESC')->paginate(15);
        // $data_batt = DB::table('m_batts')->latest('updated_at')->distinct()->paginate(20);
        // dd($data_batt);
        $data_batt->appends($request->all());
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
        $timezone = time() + (60 * 60 * 7);
        $date_now = gmdate('d-m-Y H:i:s', $timezone);
        return Excel::download(new mbattsExport, 'm_batss_'.$date_now.'.xlsx');

    }

    public function voltageUpdate(){
        // $voltageUpdate = M_batt::orderBy('updated_at', 'DESC')->first();
        $voltageUpdate =  DB::table('m_batts')
            ->where('d_test', '!=', 'null' )
            ->orderBy('d_test', 'DESC')
            ->first();
        // dd($voltageUpdate);
        return view('voltageUpdate',["title" => "V&IR Update", "voltage" => $voltageUpdate]);
    }

    //import now
    // public function m_battimportexcel(Request $request){
    //     $file = $request->file('file');
    //     $mbattsImport = new mbattsImport($request->po_name, $request->batch,);
    //     $namaFile = $file->getClientOriginalName();
    //     $file->move('DataExcel', $namaFile);

    //     Excel::import($mbattsImport, public_path('/DataExcel/'.$namaFile));
    //     return redirect('/batt_show');

    // }

    public function m_battimportexcel(Request $request){
        $po_name = $request->input('po_name');
        $file = $request->file('file');
        $bin_filter = M_bin::where('po', $po_name)->orderBy('bin', 'ASC')->get(['bin','bin_param']);
        
        // echo $bin_filter;
        $mbattsImport = new mbattsImport($request->po_name, $request->batch, $bin_filter);
        $namaFile = $file->getClientOriginalName();
        $file->move('DataExcel', $namaFile);

        Excel::import($mbattsImport, public_path('/DataExcel/'.$namaFile));
        return redirect('/batt_show');

    }


    public function getBattData(Request $request, $batt_qr_code){

        $frame_batt = M_batt::where('cell_sern', $batt_qr_code)->first();
        // return view('frame_batt')->with([
        //     'data'=>$frame_batt
        // ]);
        return response()->json($frame_batt);
        // echo $frame_batt ;

    }

    public function getFrameData(Request $request, $frameValue){

        $frame_data = M_batt::where('frame_sn', $frameValue)->first();
        // return view('frame_batt')->with([
        //     'data'=>$frame_batt
        // ]);
        // dd($frame_data);
        return response()->json($frame_data);
        // echo $frame_batt ;

    }

    public function saveFrameData(Request $request, $counter){

        $cell_sern = $request->cell_sern;
        $frame_sn = $request->frame_sn;
        $bin = $request->bin;
        $cell = $request->cell;
        $v_status = $request->v_status;
        $ir_status = $request->ir_status;
        $counter = (int)$counter;

        for ($i = 0; $i < $counter ; $i++){

            $data = M_batt::where('cell_sern', $cell_sern[$i])->first();
            $data->cell_sern = $cell_sern[$i];
            // $data->frame_sn = $frame_sn[$i];
            $data->frame_sn = $frame_sn;
            $data->bin = $bin[$i];
            $data->cell = $cell[$i];
            $data->v_status = $v_status[$i];
            $data->ir_status = $ir_status[$i];
            $data->update();

            // return response()->json('success', 200);
            if($i == $counter-1){
               return response()->json('success', 200);
            }


        }







    }

}