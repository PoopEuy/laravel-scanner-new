<?php

namespace App\Exports;

use App\Models\M_batt;
use Maatwebsite\Excel\Concerns\FromCollection;

class mbattsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return M_batt::all();
    }
}