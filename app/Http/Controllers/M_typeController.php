<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_type;

class M_typeController extends Controller
{
    public function importDataPage(Request $request){

        $data_mtype = M_type::distinct('type_batt')->get();

        return view('importData',["title" => "ImportPage", "data_mtype" => $data_mtype]);
    }

    public function selectType(Request $request){

        $data_mtype = M_type::distinct('type_batt')->get();

        return view('binSetting',["title" => "binSetting", "data_mtype" => $data_mtype]);
    }

    public function battInfo(Request $request){

        $data_mtype = M_type::distinct('type_batt')->get();

        return view('battInfo',["title" => "battInfo", "data_mtype" => $data_mtype]);
    }

    public function get_po_type(Request $request){
        $type_batt = $request->type_batt;
        $data_po = M_type::where('type_batt', $type_batt)->get();
        //  dd($data_po);
        return response()->json($data_po);
        

    }

    public function createMtype(Request $request){
        
         $validatedData = $request->validate([
            'po' => 'string|max:20', //bisa pakai tanda | atau array
            'type_batt' => 'string|max:20',
            

        ]);

        M_type::create($validatedData);

        $request->session()->flash('success', 'Battery Type Setting Success!!');
        return redirect('/typeSetting');

    }
}
