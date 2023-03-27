<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_bin;

class M_binController extends Controller
{
   public function getBinMaster(Request $request){
       
        $bin_data = M_bin::all();
        //  dd($po_batt);
        return response()->json($bin_data);
        

    }

    public function getBinByPo(Request $request){
        $po_name = $request->po_name;
        $bin_data = M_bin::where('po', $po_name)->get();
        //  dd($bin_data);
        return response()->json($bin_data);
        

    }

    public function createMbin(Request $request){
        
        // $po_name = $request->input('po_name');
       
        // dd($po_name);
        // return $request->all();
        $validatedData = $request->validate([
            'po' => 'required|max:20', //bisa pakai tanda | atau array
            'bin' => 'required|numeric|min:0|not_in:0',
            'bin_param' => 'required|numeric|min:0|not_in:0'

        ]);
        // dd("regis sukses");

        M_bin::create($validatedData);

        $request->session()->flash('success', 'Bin Setting Success!!');
        return redirect('/binSetting');

    }
}
