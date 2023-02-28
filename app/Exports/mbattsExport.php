<?php

namespace App\Exports;

use App\Models\M_batt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class mbattsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return M_batt::all();
        // return DB::table('m_batts')->where('ir_gr', '!=', null )->where('v_gr', '!=', null )->get();
        return DB::table('m_batts')
            ->select('cell_sern', 'capa_grad', 'crtn_sern', 'm', 'c_po', 'v_po', 'ir_po', 'k', 'w', 'ha', 'hc', 't', 'bin', 'v_gr', 'delta_mv', 'v_average', 'v_status', 'ir_gr', 'delta_ir', 'ir_average','ir_status','frame_sn','d_test')
            ->where('ir_gr', '!=', null )
            ->where('v_gr', '!=', null )
            ->get();
    }
    public function headings(): array
    {
         return[
            'Cell Series Number',
            'Capacity Grading',
            'Carton Series Number',
            'Cell Weight after 2nd Electrolyte Injection (g)',
            'DC Capacity (Ah)',
            'V_po (mV)',
            'IR_po (uOhm',
            'K Value (mV/Mth)',
            'Cell Width (mm)',
            'Height at Anode Pole (mm)',
            'Height at Cathode Pole (mm)',
            'Cell Thickness (mm)',
            'BIN',
            'V_gr',
            'delta_mv',
            'delta mv Average',
            'V_Status',
            'IR_gr',
            'delta_ir',
            'delta ir Average',
            'IR_Status',
            'frame_sn',
            'D_Test'

         ];
    }
}

// class mbattsExport implements FromView
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function view(): \Illuminate\Contracts\View\View
//     {
//         return view('table_batt_value', [
//             'data_batt' => DB::table('m_batts')->where('ir_gr', '!=', null )->where('v_gr', '!=', null )->get()
//         ]);
//     }
// }
